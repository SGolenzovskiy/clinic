<?php

namespace Clinic\Http\Controllers;

use Carbon\Carbon;
use Clinic\Models\Patient;
use Clinic\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Ajax регистрация визита
     *
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public function visit(Request $request)
    {
        $this->validate($request, [
            'surname'   => 'required',
            'phone'     => 'required|digits:10|integer'
        ]);

        $patient = new Patient();
        if (!$patient->getByPhone($request->phone)) {
            try {
                $patient->phone = $request->phone;
                $patient->surname = $request->surname;
                $patient->saveOrFail();
            } catch (\Exception $exception) {
                var_dump($exception);
            }
        } else {
            $patient = $patient->getByPhone($request->phone);
        }

        $date = '2019-08-10 10:30';
        $doctorId = 1;
        $visit = new Visit();
        if ($visit->isFreeSlotByDateByDoctor($date, $doctorId)) {
            $visit->date = new Carbon();
            $visit->doctor_id = $doctorId;
            $visit->patient_id = $patient->id;
            $visit->saveOrFail();

            echo 'это успех';
        } else {
            echo 'доктор занят';
        }
    }

    /**
     * Ajax. Получить свободные слоты (номерки).
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ajaxGetSlots(Request $request)
    {
        $this->validate($request, [
            'date'      => 'required|date|date_format:Y-m-d|after:yesterday',
            'doctorId'  => 'required'
        ]);

        $slots = new Visit();
        $busySlots = $slots->getSlotsByDayByDoctor($request->date, $request->doctorId);
        $freeSlots = $slots->getFreeSlots($busySlots);

        return response()->json([
            'freeSlots' => $freeSlots,
            'message'   => 'слоты на: ' . $request->date,
            'status'    => 'success',
            'redirect'  => ''
        ]);
    }
}

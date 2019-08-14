<?php

namespace Clinic\Http\Controllers;

use Clinic\Http\Requests\CreateVisitRequest;
use Clinic\Http\Requests\SlotsVisitRequest;
use Clinic\Models\Patient;
use Clinic\Models\Visit;
use Illuminate\Support\Facades\DB;

/**
 * Контроллер Ajax запросов.
 *
 * Class AjaxController
 * @package Clinic\Http\Controllers
 */
class AjaxController extends Controller
{
    /**
     * Ajax. Регистрация визита.
     *
     * @param CreateVisitRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function createVisit(CreateVisitRequest $request)
    {
        try {
            DB::beginTransaction();
            $patientModel = new Patient();
            $patient  = $patientModel->getByPhone($request->phone);
            if (!$patient->id) {
                $patient->phone     = $request->phone;
                $patient->surname   = $request->surname;
                $patient->name      = $request->name;
                $patient->saveOrFail();
            }

            $visit = new Visit();
            if ($visit->isFreeSlotByDateByDoctor($request->slot, $request->doctorId)) {
                $visit->date        = $request->slot;
                $visit->doctor_id   = $request->doctorId;
                $visit->patient_id  = $patient->id;
                $visit->note        = $request->note;
                $visit->saveOrFail();
            }
            DB::commit();
            return response()->json([
                'message'   => trans('app.ajax.visit_success'),
                'status'    => 'success',
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message'   => trans('app.ajax.visit_error'),
                'errors'    => $exception->getMessage(),
                'status'    => 'error'
            ]);
        }
    }

    /**
     * Ajax. Получить свободные слоты (номерки).
     *
     * @param SlotsVisitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSlots(SlotsVisitRequest $request)
    {
        $slots = new Visit();
        $slots->setSlotsPerDay($request->date);
        $busySlots = $slots->getSlotsByDayByDoctor($request->date, $request->doctorId);
        $freeSlots = $slots->getFreeSlots($busySlots);

        return response()->json([
            'freeSlots' => $freeSlots,
            'status'    => 'success'
        ]);
    }
}

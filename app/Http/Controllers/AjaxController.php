<?php

namespace Clinic\Http\Controllers;

use Clinic\Http\Requests\CreateVisitRequest;
use Clinic\Http\Requests\SlotsVisitRequest;
use Clinic\Models\Patient;
use Clinic\Models\Visit;

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
        $patient = new Patient();
        if (!$patient->getByPhone($request->phone)) {
            try {
                $patient->phone     = $request->phone;
                $patient->surname   = $request->surname;
                $patient->name      = $request->name;
                $patient->saveOrFail();
            } catch (\Exception $exception) {
                return response()->json([
                    'message'   => 'Ошибка. Повторите запрос позднее.',
                    'status'    => 'error',
                    'redirect'  => ''
                ]);

            }
        } else {
            $patient = $patient->getByPhone($request->phone);
        }

        $visit = new Visit();
        if ($visit->isFreeSlotByDateByDoctor($request->slot, $request->doctorId)) {
            $visit->date        = $request->slot;
            $visit->doctor_id   = $request->doctorId;
            $visit->patient_id  = $patient->id;
            $visit->note        = $patient->note;
            $visit->saveOrFail();
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
            'message'   => 'слоты на: ' . $request->date,
            'status'    => 'success',
            'redirect'  => ''
        ]);
    }
}

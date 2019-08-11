<?php

namespace Clinic\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Clinic\VisitRegistrationInterface;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * Время начала работы клиники
     */
    const START_VISITS      = '09:00';
    /**
     * Время окончания работы клиники
     */
    const END_VISITS        = '20:30';
    /**
     * Продолжительность одного приёма (минут)
     */
    const DURATION_VISIT    = 30;

    /**
     * Все номерки (слоты)
     * @var array
     */
    private $allSlots = [];

    /**
     * Visit constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setSlots();
    }

    /**
     * Получить доктора, проводящего прием.

     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo('Clinic\Models\Doctor');
    }

    /**
     * Получить пациента, посетившего приём.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('Clinic\Models\Patient');
    }

    /**
     * Расчет номерков (слотов)
     */
    private function setSlots()
    {
        $period = CarbonPeriod::create(self::START_VISITS, self::DURATION_VISIT . ' minutes', self::END_VISITS);
        $dates = $period->toArray();

        foreach ($dates as $slot) {
            $start  = $slot->format('H:i');
            $end    = $slot->addMinutes(self::DURATION_VISIT)->format('H:i');
            $this->allSlots[$slot->format("Y-m-d $start:s")] = [$start, $end];
        }
    }

    public function getSlotsByDayByDoctor($date, $doctorId)
    {
        $slots = $this::where('date', 'like', "$date%")->where('doctor_id', $doctorId)->get();
        $busySlots = [];
        foreach ($slots as $slot) {
            $busySlots[$slot->date] = null;
        }

        return $busySlots;
    }

    public function isFreeSlotByDateByDoctor($date, $doctorId)
    {
        return ($this::where('date', 'like', "$date%")->where('doctor_id', $doctorId)->count() > 0) ? false : true;
    }

    public function getFreeSlots($busySlots)
    {
        return array_diff_key($this->allSlots, $busySlots);
    }
}

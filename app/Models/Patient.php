<?php

namespace Clinic\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * Получить визиты пациента.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visits()
    {
        return $this->hasMany('Clinic\Models\Visit');
    }

    public function getByPhone($phone)
    {
        return ($this->where('phone', $phone)->first());
    }
}

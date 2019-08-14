<?php

namespace Clinic\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['phone'];

    /**
     * Получить визиты пациента.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visits()
    {
        return $this->hasMany('Clinic\Models\Visit');
    }

    /**
     * Получить пациента по номеру телефона.
     *
     * @param $phone
     * @return mixed
     */
    public function getByPhone($phone)
    {
        return $this->firstOrNew([
            'phone' => $phone
        ]);
    }
}

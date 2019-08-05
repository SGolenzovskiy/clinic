<?php

namespace Clinic\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * Получить специализацю доктора.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialization()
    {
        return $this->belongsTo('Clinic\Models\Specialization');
    }

    /**
     * Получить визиты доктора.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visits()
    {
        return $this->hasMany('Clinic\Models\Visit');
    }
}

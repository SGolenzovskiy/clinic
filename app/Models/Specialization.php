<?php

namespace Clinic\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    /**
     * Получить докторов специализации.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors()
    {
        return $this->hasMany('Clinic\Models\Doctor');
    }
}

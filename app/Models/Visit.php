<?php

namespace Clinic\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * Получить доктора, проводящего прием.

     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo('Clinic\Models\Doctor');
    }
}

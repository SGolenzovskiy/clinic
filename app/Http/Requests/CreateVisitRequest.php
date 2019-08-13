<?php

namespace Clinic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVisitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slot'      => 'required|date|date_format:Y-m-d H:i:s|after:yesterday',
            'doctorId'  => 'required',
            'surname'   => 'required',
            'phone'     => 'required|digits:10|integer'
        ];
    }
}

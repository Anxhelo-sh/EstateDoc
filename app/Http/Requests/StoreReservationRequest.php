<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            //
            'no_of_persons' => [ 'min:1', 'max:15', 'integer','required'] ,
            'start_date' => ['date','required'],
            'end_date' => ['date','required','after:start_date'],
            'full_name' =>['string','required','max:255'],
            'email'=>['email','required'] ,

        ];
    }
}

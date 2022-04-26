<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePropertyRequest extends FormRequest
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
            'price' => [ 'min:10', 'max:100000000', 'integer'] ,
            'category' => ['required'] ,
            'type' => ['required'] ,
            'street_adress' => ['required' ,'min:3','max:100'] ,
            'city' => ['required' ,'min:3','max:100'] ,
            'state' => ['required' ,'min:3','max:50'] ,
            'number_of_rooms' => ['required', 'integer',Rule::in([0, 1, 2, 3, 4, 5, 6,7])] ,
            'number_of_bathrooms' => ['required', 'integer',Rule::in([0, 1, 2, 3, 4, 5, 6])] ,
            'has_garden' => [ Rule::in([1, 0])] ,
            'has_pool' => [Rule::in([1, 0])] ,
            'has_furnitures' => [ Rule::in([1, 0])] ,
            'status' => [ Rule::in([1, 0])] ,
            'image' => ['required' ,'mimes:jpeg,png'] ,
        ];
    }
}

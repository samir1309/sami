<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        switch ($this->segment(3)){
            case 'add' :
                return[
                    'image'=>'max:150',
                ];
                break;
            case 'edit' :
                return [
                    'image'=>'max:150',
                ];
                break;
            case 'delete' :
                return [
                    'deleteId' => 'required',
                ];
                break;
        }

    }

    public function messages()
    {
        return [
            'image.max' => ' حجم عکس باید کمتر از ۱۵۰ کیلوبایت باشد',



        ];
    }
}

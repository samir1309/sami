<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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

                    'image'=>'max:40',
                    'title_seo'=>'max:71',
                    'description_seo'=>'max:171',


                ];
                break;
            case 'edit' :
                return [
                    'image'=>'max:40',
                    'title_seo'=>'max:71',
                    'description_seo'=>'max:171',
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

            'image.max' => ' حجم عکس باید کمتر از ۴۰ کیلوبایت باشد',
            'title_seo.max' => ' تعداد کاراکتر عنوان سئو باید کمتر از ۷۰ باشد',
            'description_seo.max' => ' تعداد کاراکتر توضیحات سئو باید کمتر از ۱۷۰ باشد',



        ];
    }

}

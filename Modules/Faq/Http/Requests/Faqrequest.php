<?php

namespace Modules\Faq\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Faqrequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'faqtitle'   => 'required',
            'faqanswer'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'faqtitle.required' => 'Please enter your Question.',
            'faqanswer.required' => 'Please enter your Answer.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

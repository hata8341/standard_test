<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostcodeRule;

class ClientRequest extends FormRequest
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
        'last_name' =>'required',
        'first_name' =>'required',
        'gender' =>'required',
        'email' =>['required','email'],
        'postcode' =>['required','size:8','regex:/^[!-~ ¥]+$/u',new PostcodeRule],
        'address' =>'required',
        'opinion' =>['required','max:120'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge(['postcode'=>mb_convert_kana($this->postcode,'as')]);
    }
    public function messages() {
        return [
        'last_name.required' => '苗字を入力してください。',
        'first_name.required' => '名前を入力してください。',
        'gender.required' => '性別を選択してください。',
        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => 'メールアドレスの形式で入力してください。',
        'postcode.required' => '郵便番号を入力してください。',
        'postcode.size' => '郵便番号をハイフンありの8文字で入力してください。',
        'postcode.regex' => '郵便番号を半角ハイフンありの8文字で入力してください。',
        'address.required' => '住所を入力してください。',
        'opinion.required' => 'ご意見を入力してください。',
        'opinion.max' =>'ご意見は120文字以内で入力してください。',
        ];

    }
}
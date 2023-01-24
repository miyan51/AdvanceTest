<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name1' => ['required', 'string', 'max:10'],
            'name2' => ['required', 'string', 'max:10'],
            'gender' => ['required'],
            'email' => ['required', 'email', 'max:255'],
            'zip11' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            'addr11' => ['required'],
            'building_name' => ['nullable'],
            'opinion' => ['required', 'max:120']
        ];
    }
    public function prepareForValidation()
    {
        // 全角→半角 英数(※変換できないものもあるので注意)
        $this->merge(['zip11' => mb_convert_kana($this->zip11, 'as')]);
    }
    public function messages()
    {
        return [

            'name1.required' => '苗字を入力してください',
            'name2.required' => '名前を入力してください',
            'name1.max:10' => '10字以内で入力してください',
            'name2.max:10' => '10字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max:255' => '255字以内で入力してください',
            'zip11.required' => '郵便番号を入力してください',
            'zip11.regex' => 'ハイフン(-)ありの8桁で入力してください',
            'addr11.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max:120' => '120字以内で入力してください',

        ];
    }
}

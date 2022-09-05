<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerCreateRequest extends FormRequest
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
            'shop_name' => 'required|string|max:191',
            'area_id' => 'required',
            'genre_id' => 'required',
            'text' => 'required|string',
            'image' =>'required|file|mimes:jpg,svg'

        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator)
    //     {
    //         $file_data = $this->file('image');
    //         $file_extension = $file_data->getClientOriginalExtension(); //拡張子取得
    //         $lower_case_extension = strtolower($file_extension); //拡張子を小文字に変換

    //         if($lower_case_extension !== 'jpg' && $lower_case_extension !== 'svg'){
    //             $validator->errors()->add('', 'アップロードされたファイルは画像ファイルではありません。');
    //         }
    //     });
    // }
}

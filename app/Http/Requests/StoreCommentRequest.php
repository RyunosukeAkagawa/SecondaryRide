<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //  'body' => 'required|string|max:200',
            'datetime' => 'required|date',
            // 'opt1' => 'required|integer',
            // 'opt2' => 'required|integer',
            // 'total' => 'required|integer',
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'body' => 'コメント',
    //     ];
    // }
}

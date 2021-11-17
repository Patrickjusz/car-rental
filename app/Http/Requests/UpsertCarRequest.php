<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertCarRequest extends FormRequest
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
            'name' => 'required|string|max:512',
            'description' => 'nullable|string|max:2048',
            'price' => 'required|numeric',
            // 'amount' => 'nullable|integer',
            'state' => 'required|in:active,inactive',
        ];
    }
}

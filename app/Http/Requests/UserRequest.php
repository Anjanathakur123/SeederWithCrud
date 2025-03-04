<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $data = [
                'name' => 'required|string|max:255',
                'city' => 'nullable|string',
        ];
        if($this->isMethod('post')){
            $data = [
                'email' => 'required|email|unique:users,email',
                'role_id' => 'required|string',
            ];
        }else{
            $data = [
                'email' => 'required|email|unique:users,email,' . $this->id,
                'role_id' => 'required|exists:roles,id',
            ];
        }
        return $data;
    }
}

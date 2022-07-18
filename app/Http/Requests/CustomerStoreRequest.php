<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'department_name' => [
                'nullable',
                'required_without_all:employees,employees_after17',
                'string',
                'max:50',
            ],
            'employees' => [
                'nullable',
                'required_without_all:department_name,employees_after17',
                'string',
                'max:50',
            ],
            'employees_after17' => [
                'nullable',
                'required_without_all:department_name,employees',
                'string',
                'max:50',
            ],
            'email' => [
                'nullable',
                'string',
                'email',
                'max:191',
                'unique:customers',
            ],
        ];
    }
}

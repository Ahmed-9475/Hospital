<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationStoreAmbulance extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'car_number'=>['required','max:11'],
            'car_model'=>['required', 'string','min:5','max:11'],
            'car_year_made'=>['required', 'numeric','digits:4'],
            'car_type'=>['required'],
            'driver_name'=>['required', 'unique:ambulance_translations,driver_name'],
            'driver_license_number'=>['required', 'numeric','digits:14','unique:ambulances,driver_license_number'],
            'driver_phone'=>['required', 'numeric','digits:9'],
            'notes'=>['nullable','max:150'],
            
        ];
    }

    public function messages():array
    {
        return [

           // 'driver_license_number.size' =>'يجب أن يكون رقم رخصة القيادة 14رقم',
        ];
    }
}

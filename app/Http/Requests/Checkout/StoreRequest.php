<?php

namespace App\Http\Requests\Checkout;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'schedule' => Carbon::parse($this->date.' '.$this->time)->format('Y-m-d h:i A'),
        ]);
    }

    public function attributes(): array
    {
        return [
            'schedule' => 'Schedule',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required', 'string', 'max:255'],
            'schedule' => ['required', 'date_format:"Y-m-d h:i A"'],
            'address' => ['required', 'string', 'max:255'],
            'agreement' => ['required'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $validator->schedule = Carbon::parse($this->date.' '.$this->time)->format('Y-m-d h:i A');
        });
    }
}

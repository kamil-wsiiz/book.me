<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'opening_from' => ['required', 'numeric', 'min:0', 'max:24', 'lt:opening_to'],
            'opening_to' => ['required', 'numeric', 'min:0', 'max:24', 'gt:opening_from'],
        ];
    }
}

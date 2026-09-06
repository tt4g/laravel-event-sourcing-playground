<?php

namespace App\Http\Requests\Account;

use App\Rules\BalanceAmount;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepositRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'deposit_amount' => [
                'required',
                BalanceAmount::create(),
            ]
        ];
    }
}

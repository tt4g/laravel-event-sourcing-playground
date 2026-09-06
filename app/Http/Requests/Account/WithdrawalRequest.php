<?php

namespace App\Http\Requests\Account;

use App\Rules\BalanceAmount;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WithdrawalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'withdrawal_amount' => [
                'required',
                BalanceAmount::create(),
            ]
        ];
    }
}

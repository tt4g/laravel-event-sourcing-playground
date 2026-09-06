<?php

namespace App\Rules;

use Illuminate\Validation\Rule;

class BalanceAmount
{
    static function create(): \Illuminate\Validation\Rules\Numeric {
        return Rule::numeric()->min(1)->max(10_000);
    }
}

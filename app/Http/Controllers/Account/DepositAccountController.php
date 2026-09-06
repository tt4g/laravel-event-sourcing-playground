<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\DepositRequest;
use App\Inertia\Toast\Toaster;
use App\Models\Account;

class DepositAccountController extends Controller
{
    public function deposit(
        Account $account,
        DepositRequest $depositRequest
    ): \Illuminate\Http\RedirectResponse  {
        ['deposit_amount' => $depositAmount] =
            $depositRequest->safe(['deposit_amount']);

        $account->addMoney($depositAmount);

        Toaster::success('Deposit amount: ' . $depositAmount);

        return to_route('accounts.show', [$account]);
    }
}

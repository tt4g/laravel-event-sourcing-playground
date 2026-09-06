<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\WithdrawalRequest;
use App\Inertia\Toast\Toaster;
use App\Models\Account;

class WithdrawAccountController extends Controller
{
    public function withdraw(
        Account $account,
        WithdrawalRequest $withdrawalRequest,
    ): \Illuminate\Http\RedirectResponse {
        ['withdrawal_amount' => $withdrawalAmount] =
            $withdrawalRequest->safe(['withdrawal_amount']);

        $account->subtractMoney($withdrawalAmount);

        Toaster::success('Withdrawal amount: ' . $withdrawalAmount);

        return to_route('accounts.show', [$account]);
    }
}

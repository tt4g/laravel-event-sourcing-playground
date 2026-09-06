<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Inertia\Inertia;

class ShowAccountController extends Controller
{
    public function show(Account $account): \Inertia\Response {
        $account->loadMissing('transactionCount');

        return Inertia::render(
            'Accounts/Show',
            [
                'account' => $account,
            ]
        );
    }
}

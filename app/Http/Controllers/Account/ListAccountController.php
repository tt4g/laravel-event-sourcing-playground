<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Inertia\Inertia;

class ListAccountController extends Controller
{
    public function index(): \Inertia\Response {
        $accounts =
            Account::listAccounts()
                ->get(
                    [
                        'uuid',
                        'name',
                        'balance',
                    ]
                );

        return Inertia::render(
            'Accounts/Index',
            [
                'accounts' => $accounts,
            ]
        );
    }
}

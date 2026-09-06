<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAccountRequest;
use App\Inertia\Toast\Toaster;
use App\Models\Account;

class StoreAccountController extends Controller
{
    public function store(
        StoreAccountRequest $storeAccountRequest,
    ): \Illuminate\Http\RedirectResponse {
        $attributes = $storeAccountRequest->safe(['name']);
        $attributes['balance'] = 0;
        $account = Account::createWithAttributes($attributes);

        Toaster::success('Account "' . $account->name . '" created!');

        return to_route('accounts.index');
    }
}

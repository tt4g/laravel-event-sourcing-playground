<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Inertia\Toast\Toaster;
use App\Models\Account;

class DestroyAccountController extends Controller
{
    public function destroy(
        Account $account,
    ): \Illuminate\Http\RedirectResponse {
        $account->remove();

        Toaster::success('Account "' . $account->name . '" deleted!');

        return to_route('accounts.index');
    }
}

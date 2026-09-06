<?php

use App\Http\Controllers\Account\DepositAccountController;
use App\Http\Controllers\Account\DestroyAccountController;
use App\Http\Controllers\Account\ListAccountController;
use App\Http\Controllers\Account\ShowAccountController;
use App\Http\Controllers\Account\StoreAccountController;
use App\Http\Controllers\Account\WithdrawAccountController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [WelcomeController::class, 'index']
)->name('home');

Route::inertia('dashboard', 'dashboard')->name('dashboard');

Route::group(
    [
        'prefix' => '/accounts'
    ],
    static function () {
        Route::get(
            '',
            [ListAccountController::class, 'index']
        )
        ->name('accounts.index');

        Route::post(
            '',
            [StoreAccountController::class, 'store']
        )
        ->name('accounts.store');

        Route::inertia(
            '/create',
            'Accounts/Create',
        )->name('accounts.create');

        Route::get(
            '/{account}',
            [ShowAccountController::class, 'show'],
        )->name('accounts.show');

        Route::put(
            '/{account}/withdraw',
            [WithdrawAccountController::class, 'withdraw']
        )
        ->name('accounts.withdraw');

        Route::put(
            '/{account}/deposit',
            [DepositAccountController::class, 'deposit']
        )
        ->name('accounts.deposit');

        Route::delete(
            '/{account}',
            [DestroyAccountController::class, 'destroy']
        )
        ->name('accounts.destroy');
    }
);

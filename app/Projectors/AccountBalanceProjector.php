<?php

namespace App\Projectors;

use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\Models\Account;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AccountBalanceProjector extends Projector
{
    public function onAccountCreated(AccountCreated $event): void
    {
        $accountAttributes = $event->accountAttributes;
        $accountAttributes['balance'] = $accountAttributes['balance'] ?? 0;

        (new Account())
            ->forceFill($accountAttributes)
            ->writeable()
            ->save();
    }

    public function onMoneyAdded(MoneyAdded $event): void
    {
        $account = Account::uuid($event->accountUuid);

        $account->balance += $event->amount;

        $account
            ->writeable()
            ->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event): void
    {
        $account = Account::uuid($event->accountUuid);

        $account->balance -= $event->amount;

        $account
            ->writeable()
            ->save();
    }

    public function onAccountDeleted(AccountDeleted $event): void
    {
        Account::uuid($event->accountUuid)
            ->writeable()
            ->delete();
    }
}

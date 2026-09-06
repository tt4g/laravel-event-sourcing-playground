<?php

namespace App\Projectors;

use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\Models\TransactionCount;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class TransactionCountProjector extends Projector
{
    public function onMoneyAdded(MoneyAdded $event): void
    {
        $transactionCounter =
            $this->firstOrNewTransactionCount($event);

        $transactionCounter->count++;

        $transactionCounter->writeable()->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event): void
    {
        $transactionCounter =
            $this->firstOrNewTransactionCount($event);

        $transactionCounter->count--;

        $transactionCounter->writeable()->save();
    }

    private function firstOrNewTransactionCount(
        MoneyAdded|MoneySubtracted $event,
    ): TransactionCount {
        $accountUuid = $event->accountUuid;
        $transactionCount =
            TransactionCount::query()
                ->where('account_uuid', '=', $accountUuid)
                ->first();
        if ($transactionCount !== null) {
            return $transactionCount;
        }

        return TransactionCount::newWithAccount($accountUuid);
    }
}

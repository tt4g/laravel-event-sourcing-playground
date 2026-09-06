<?php

declare(strict_types=1);

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class MoneyAdded extends ShouldBeStored
{
    public function __construct(
        public private(set) readonly string $accountUuid,
        public private(set) readonly int $amount,
    )
    {
    }
}

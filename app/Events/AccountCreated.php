<?php

declare(strict_types=1);

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class AccountCreated extends ShouldBeStored
{
    public function __construct(
        /**
         * @var array<mixed> $accountAttributes
         * @phpstan-param array{
         *     uuid: string,
         *     name: string,
         *     balance?: int,
         * } $attributes
         */
        public private(set) readonly array $accountAttributes,
    )
    {
    }
}

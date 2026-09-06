<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property int $id
 * @property string $uuid
 * @property string $account_uuid
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
#[Fillable()]
class TransactionCount extends Projection
{
    public static function newWithAccount(
        string $accountUuid,
    ): self {
        $transactionCount = new self();
        $transactionCount->uuid = (string) Uuid::uuid7();

        $transactionCount->account_uuid = $accountUuid;
        $transactionCount->count = 0;

        return $transactionCount;
    }

    /**
     * @return BelongsTo<Account, $this>
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uuid', 'uuid');
    }
}

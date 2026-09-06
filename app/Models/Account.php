<?php

namespace App\Models;

use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
#[Fillable()]
class Account extends Projection
{
    /**
     * @param array<mixed> $attributes
     * @phpstan-param array{
     *     name: string,
     *     balance?: int,
     * } $attributes
     */
    public static function createWithAttributes(array $attributes): Account
    {
        /*
         * Let's generate a uuid.
         */
        $attributes['uuid'] = (string) Uuid::uuid7();

        /*
         * The account will be created inside this event using the generated uuid.
         */
        event(new AccountCreated($attributes));

        /*
         * The uuid will be used the retrieve the created account.
         */
        return static::uuid($attributes['uuid']);
    }

    public function addMoney(int $amount): void
    {
        event(new MoneyAdded($this->uuid, $amount));
    }

    public function subtractMoney(int $amount): void
    {
        event(new MoneySubtracted($this->uuid, $amount));
    }

    public function remove(): void
    {
        event(new AccountDeleted($this->uuid));
    }

    /*
     * A helper method to quickly retrieve an account by uuid.
     */
    public static function uuid(string $uuid): Account|null
    {
        return static::query()->where('uuid', '=', $uuid)->first();
    }

    /**
     * Query scope to list accounts.
     *
     * @param Builder $query
     * @return void
     * @phpstan-param Builder<self> $query
     */
    #[Scope]
    protected function listAccounts(Builder $query): void
    {
        $query->orderBy('id', 'asc');
    }

    /**
     * @return HasOne<TransactionCount, $this>
     */
    public function transactionCount(): HasOne
    {
        return $this->hasOne(TransactionCount::class, 'account_uuid', 'uuid');
    }
}

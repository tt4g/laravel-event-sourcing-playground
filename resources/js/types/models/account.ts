import { type TransactionCount } from "./transaction_count";

/**
 * See: `App\Models\Account`
 */
export type Account = Readonly<{
    uuid: string,
    name: string;
    balance: number;
}>;

export type WithTransactionCount<T extends Account = Account> = T & Readonly<{
    transaction_count: TransactionCount,
}>;

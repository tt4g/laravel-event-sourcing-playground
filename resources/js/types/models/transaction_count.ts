/**
 * See: `App\Models\TransactionCount`
 */
export type TransactionCount = Readonly<{
    uuid: string,
    account_uuid: string,
    count: number;
}>;

import { Form, Head, usePage } from '@inertiajs/react';
import { index as accountIndex, withdraw as accountWithdraw, deposit as accountDeposit } from '@/routes/accounts';
import { Account, WithTransactionCount } from '@/types/models/account';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useId } from 'react';
import TextLink from '@/components/text-link';
import { Label } from '@/components/ui/label';
import InputError from '@/components/input-error';

/**
 * `App\Http\Controllers\Account\ShowAccountController::show()` response.
 */
type ShowAccountResponse = Readonly<{
    account: WithTransactionCount<Account>,
}>;

export default function AccountShow({ account }: ShowAccountResponse) {
    const { errors } = usePage().props;
    const withdrawValueId = useId();
    const depositValueId = useId();
    return <>
        <Head title={`${account.name} | Account`} />
        <div className="h-full w-full flex flex-col gap-4 m-6">
            <div className="flex flex-col gap-4 bg-card text-card-foreground rounded-xl border p-6 shadow-sm">
                <div className="flex flex-col gap-1 border-b">
                    <h1 className="text-xl font-semibold">
                        {account.name}
                    </h1>
                </div>
                <div className="flex flex-col">
                    <h2 className="text-lg">
                        Transaction Count
                    </h2>
                    <p className="text-neutral-600 text-base">
                        Value: {account.transaction_count.count}
                    </p>
                </div>
                <div className="flex flex-col">
                    <h2 className="text-lg">
                        Balance
                    </h2>
                    <p className="text-neutral-600 text-base">
                        Value: {account.balance}
                    </p>
                    <div className="flex flex-col py-2 my-2 border-t">
                        <h3 className="text-base mb-2">
                            Deposit
                        </h3>
                        <Form action={accountDeposit(account.uuid)}
                              className="flex flex-col gap-2"
                        >
                            <div className="flex flex-1 flex-col w-md">
                                <Label htmlFor={depositValueId}
                                       className="mb-1"
                                >
                                    Deposit amount
                                </Label>
                                <Input id={depositValueId}
                                    name="deposit_amount"
                                />
                                { errors.deposit_amount && <InputError message={errors.deposit_amount} /> }
                            </div>
                            <Button
                                type="submit"
                                variant="default"
                                className="w-md"
                            >
                                Apply
                            </Button>
                        </Form>
                    </div>
                    <div className="flex flex-col py-2 my-2 border-t">
                        <h3 className="text-base mb-2">
                            Withdraw
                        </h3>
                        <Form action={accountWithdraw(account.uuid)}
                                className="flex flex-col gap-2"
                        >
                            <div className="flex flex-1 flex-col w-md">
                                <Label htmlFor={withdrawValueId}
                                       className="mb-1"
                                >
                                    Withdrawal amount
                                </Label>
                                <Input id={withdrawValueId}
                                    name="withdrawal_amount"
                                />
                                { errors.withdrawal_amount && <InputError message={errors.withdrawal_amount} /> }
                            </div>
                            <Button
                                type="submit"
                                variant="default"
                                className="w-md"
                            >
                                Apply
                            </Button>
                        </Form>
                    </div>
                </div>
            </div>
            <TextLink href={accountIndex()}>
                        Account List
                    </TextLink>
        </div>
    </>
}

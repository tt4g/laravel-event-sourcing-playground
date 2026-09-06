import { Form, Head, Link } from '@inertiajs/react';
import { create as accountCreate, show as accountShow, destroy as accountDestroy } from '@/routes/accounts';
import { Account } from '@/types/models/account';
import ButtonLink from '@/components/ui/button-link';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';

/**
 * `App\Http\Controllers\Account\ListAccountController::index()` response.
 */
type ListAccountResponse = Readonly<{
    accounts: readonly Account[],
}>;

export default function AccountIndex({ accounts }: ListAccountResponse) {
    return <>
        <Head title="Account" />
        <div className="flex flex-col gap-4 items-center">
            <ButtonLink
                href={accountCreate()}
                className="self-end"
                variant="link"
            >
                Create Account
            </ButtonLink>
            <ul className="flex flex-col gap-2">
                {accounts.map(account =>
                    <li key={account.uuid}
                        className="w-md overflow-hidden flex flex-col gap-2">
                        <Card>
                            <CardHeader>
                                <CardTitle>
                                    <Link href={accountShow(account.uuid)}
                                          className="hover:underline">
                                        {account.name}
                                    </Link>
                                </CardTitle>
                            </CardHeader>
                            <CardFooter>
                                <Form action={accountDestroy(account.uuid)}
                                className="w-full flex flex-row justify-end pt-2 border-t">
                                    <Button
                                        type="submit"
                                        variant="destructive"
                                        size="sm"
                                    >
                                        Delete
                                    </Button>
                                </Form>
                            </CardFooter>
                        </Card>
                    </li>
                )}
            </ul>
        </div>
    </>
}

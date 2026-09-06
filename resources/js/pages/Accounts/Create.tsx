import { Head, Form, usePage } from '@inertiajs/react';
import { index as accountIndex, store as accountStore } from '@/routes/accounts';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { useId } from 'react';
import TextLink from '@/components/text-link';
import InputError from '@/components/input-error';
import { Input } from '@/components/ui/input';

export default function AccountCreate() {
    const { errors } = usePage().props;
    const nameId = useId();

    return <>
        <Head title="Create Account" />
        <div className="w-full max-w-xs m-2 flex flex-col gap-4 items-center self-center">
            <Form action={accountStore()}
                  className="flex flex-col gap-4 items-start bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            >
                <div className="flex flex-col gap-2">
                    <Label htmlFor={nameId}>
                        Username
                    </Label>
                    <Input
                        id={nameId}
                        type="text"
                        name="name"
                    />
                    { errors.name && <InputError message={errors.name} /> }
                </div>
                <Button type="submit" variant="default">
                    Create Account
                </Button>
            </Form>
            <TextLink
                href={accountIndex()}
                className="flex"
            >
                Account List
            </TextLink>
        </div>
    </>
}

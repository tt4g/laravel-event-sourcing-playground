import { Button, type ButtonVariantProps } from "@/components/ui/button";
import { Link, type InertiaLinkProps } from '@inertiajs/react';

export type ButtonLinkProps = ButtonVariantProps & InertiaLinkProps;

export default function ButtonLink({
    children,
    ...props
}: ButtonLinkProps) {
    return (
        <Button asChild {...props}>
            <Link>
                {children}
            </Link>
        </Button>
    );
}

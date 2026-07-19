import { Head, Link, usePage } from '@inertiajs/react';
import { dashboard } from '@/routes';

/**
 * `App\Http\Controllers\WelcomeController::index()` response.
 */
type WelcomeResponse = Readonly<{
    welcomeMessage: string
}>;

export default function Welcome({ welcomeMessage }: WelcomeResponse) {
    const page = usePage();

    const { app } = page.props;
    return (
        <>
            <Head title="Welcome" />
            <div className="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
                <header className="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl">
                    <nav className="flex items-center justify-end gap-4">
                        <Link
                            href={dashboard()}
                            className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                        >
                            Dashboard
                        </Link>
                    </nav>
                </header>
                <div className="flex w-full items-start justify-start opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                    <main className="flex w-full flex-col items-start justify-start">
                        <p>Welcome to { app.name }</p>
                        <p>{ welcomeMessage }</p>
                    </main>
                </div>
                <div className="hidden h-14.5 lg:block"></div>
            </div>
        </>
    );
}

declare module 'react' {
    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    interface InputHTMLAttributes<T> {
        passwordrules?: string;
    }
}

declare module '@inertiajs/core' {
    export interface InertiaConfig {
        sharedPageProps: {
            app: Readonly<{
                name: string;
            }>;
            sidebarOpen: boolean;
            [key: string]: unknown;
        };
    }
}

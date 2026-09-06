<?php

declare(strict_types=1);

namespace App\Inertia\Toast;

use Inertia\Inertia;

/**
 * See: `resources/js/hooks/use-flash-toast.ts`
 */
abstract class Toaster
{
    /**
     * Show success toast.
     */
    public static function success(string $message): void
    {
        self::flashToast($message, ToastType::Success);
    }

    /**
     * Show info toast.
     */
    public static function info(string $message): void
    {
        self::flashToast($message, ToastType::Success);
    }

    /**
     * Show warning toast.
     */
    public static function warning(string $message): void
    {
        self::flashToast($message, ToastType::Success);
    }

    /**
     * Show error toast.
     */
    public static function error(string $message): void
    {
        self::flashToast($message, ToastType::Success);
    }

    private static function flashToast(
        string $message,
        ToastType $toastType
    ): void {
        Inertia::flash([
            'toast' => [
                'message' => $message,
                'type' => $toastType->value,
            ],
        ]);
    }
}

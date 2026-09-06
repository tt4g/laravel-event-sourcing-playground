<?php

declare(strict_types=1);

namespace App\Inertia\Toast;

/**
 * Toast type.
 *
 * See: `resources/js/hooks/use-flash-toast.ts`
 */
enum ToastType : string
{
    case Success = 'success';

    case Info = 'info';

    case Warning = 'warning';

    case Error = 'error';
}

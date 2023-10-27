<?php

declare(strict_types=1);

namespace App\Domains\Products\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ARCHIVED()
 * @method static static ACTIVE()
 */
final class ItemStatusEnum extends Enum
{
    const ARCHIVED = 0;

    const ACTIVE = 1;
}

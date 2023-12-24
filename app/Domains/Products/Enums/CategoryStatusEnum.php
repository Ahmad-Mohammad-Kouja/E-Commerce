<?php

declare(strict_types=1);

namespace App\Domains\Products\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CategoryStatusEnum extends Enum
{
    const INACTIVE = 0;

    const ACTIVE = 1;

    const ARCHIVED = 2;
}

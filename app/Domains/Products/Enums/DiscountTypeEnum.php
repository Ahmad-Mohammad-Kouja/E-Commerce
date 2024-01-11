<?php

declare(strict_types=1);

namespace App\Domains\Products\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DiscountTypeEnum extends Enum
{
    const FIXED = 0;
    const PERCENTAGE = 1;
}

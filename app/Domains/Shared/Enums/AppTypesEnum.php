<?php

declare(strict_types=1);

namespace App\Domains\Shared\Enums;

use BenSampo\Enum\Enum;

final class AppTypesEnum extends Enum
{
    public const ADMIN = 'admin';

    public const USER = 'user';
}

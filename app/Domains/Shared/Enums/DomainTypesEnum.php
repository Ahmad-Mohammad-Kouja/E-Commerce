<?php

declare(strict_types=1);

namespace App\Domains\Shared\Enums;

use BenSampo\Enum\Enum;

final class DomainTypesEnum extends Enum
{
    public const ENTITIES = 'entities';

    public const LOCATIONS = 'locations';

    public const OPERATIONS = 'operations';

    public const PRODUCTS = 'products';

    public const SHARED = 'shared';

    public const STORES = 'store';
}

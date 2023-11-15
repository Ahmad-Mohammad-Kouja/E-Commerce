<?php

namespace App\Domains\Products\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PricesCountMatchesStoresCount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $items = request()->input('items');
        foreach ($items as $item) {
            if (count($item['stores']) !== count($item['prices'])) {
                $fail('The :attribute must be count equal count stores.');
            }
        }
    }
}

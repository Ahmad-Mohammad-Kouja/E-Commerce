<?php

namespace App\Domains\Products\Rules;

use App\Domains\Products\Models\Category;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CategoryHasParentRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $parent = Category::where('id', $value)->whereNull('parent_id')->first();
        if (empty($parent)) {
            $fail('The :attribute must be doesn\'t have parent_id.');
        }
    }
}

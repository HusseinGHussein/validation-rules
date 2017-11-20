<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MustContainWords implements Rule
{
    protected $words = [
        'foo',
        'bar',
        'baz',
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('(' . implode('|', $this->words) . ')', $value) === 1);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute does not contain any of the criteria words.';
    }
}

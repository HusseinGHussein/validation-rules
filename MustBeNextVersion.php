<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MustBeNextVersion implements Rule
{
    /**
     * The version instance.
     *
     * @var Model
     */
    protected $model;

    /**
     * Create a new rule instance.
     *
     * @param  Model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return version_compare($this->model->version, $value, '<');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be higher version than the current one.';
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DomainMXRecord implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $host = last(explode('@', $value));
        return checkdnsrr($host,'MX');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Enter Valid Email Address';
    }
}

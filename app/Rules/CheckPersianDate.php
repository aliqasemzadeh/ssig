<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPersianDate implements Rule
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
        $dateArray = explode('/', $value);
        if(count($dateArray) != 3) {
            return false;
        }
        return \Morilog\Jalali\CalendarUtils::checkDate($dateArray[0], $dateArray[1], $dateArray[2]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('global.invalid_date');
    }
}

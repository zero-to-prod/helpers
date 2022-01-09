<?php

use Carbon\Carbon;

if (! function_exists('days_left_in_month')) {
    /**
     * @see DaysLeftInMonthTest::days_left_in_month()
     */
    function days_left_in_month(?DateTime $date = null): int
    {
        if ($date === null) {
            $date = new DateTime();
        }

        $lastDayOfThisMonth = new DateTime('last day of this month');

        return (int) $lastDayOfThisMonth->diff($date)->format('%a days');
    }
}

if (! function_exists('diff_for_humans')) {
    /**
     * A wrapper for Carbon diffForHumans().
     *
     * @see DiffForHumansTest::diff_for_humans()
     */
    function diff_for_humans(DateTimeInterface|string|null $time): string
    {
        return Carbon::parse($time)->diffForHumans();
    }
}

if (! function_exists('random_bool')) {
    /**
     * Returns a random boolean.
     */
    function random_bool(): bool
    {
        return random_int(0, 1) === 1;
    }
}
<?php

use Carbon\Carbon;

if (! function_exists('array_to_string_in_quotes')) {
    /**
     * Turns an array to list of quoted strings
     *
     * example: ['1', '2'] returns '1', '2'
     */
    function array_to_string_in_quotes(array $array, bool $double_quotes = false): string
    {
        $collection = collect($array);

        return $double_quotes ? '"'.$collection->join('", "', '", "').'"' : "'".$collection->join("', '", "', '")."'";
    }
}

if (! function_exists('days_left_in_month')) {
    /**
     * Returns the number of days left in a given month
     */
    function days_left_in_month(DateTime $date = new DateTime(), DateTime $month = new DateTime('last day of this month')): int
    {
        return (int) $month->diff($date)->format('%a days');
    }
}

if (! function_exists('days_left_in_this_month')) {
    /**
     * Returns the number of days left in this month
     */
    function days_left_in_this_month(): int
    {
        return days_left_in_month(new DateTime(), new DateTime('last day of this month'));
    }
}

if (! function_exists('diff_for_humans')) {
    /**
     * A wrapper for Carbon diffForHumans().
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
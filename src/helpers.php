<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

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

if (! function_exists('get_item')) {
    /**
     * Returns the value of an item by key.
     */
    function get_item($items = null, string $key = 'id', $default = null): mixed
    {
        return collect((array) $items)->get($key, $default);
    }
}

if (! function_exists('locale')) {
    /**
     * Gets the local of the app
     */
    function locale(): string
    {
        return str_replace('_', '-', app()->getLocale());
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

if (! function_exists('slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     */
    function slug(string $title, string $separator = '_', string $language = 'en'): string
    {
        return Str::slug($title, $separator, $language);
    }
}

if (! function_exists('unslug')) {
    /**
     * Removes slug separator.
     */
    function unslug(string $slug, string $separator = '_'): string
    {
        return str_replace($separator, ' ', $slug);
    }
}

if (! function_exists('unslug_title')) {
    /**
     * Removes slug separator and sets string to title case.
     */
    function unslug_title(string $slug, string $separator = '_', bool $title_case = false): string
    {
        return $title_case ? Str::title(unslug($slug, $separator)) : ucfirst(unslug($slug));
    }
}

if (! function_exists('remove_trailing_character')) {
    /**
     * Removes a trailing character.
     */
    function remove_trailing_character(string $string, string $character = ' '): string
    {
        if (strrev($string)[0] === $character) {
            return substr($string, 0, -1);
        }

        return $string;
    }
}

if (! function_exists('remove_trailing_slash')) {
    /**
     * Removes a trailing slash.
     */
    function remove_trailing_slash(string $string): string
    {
        return remove_trailing_character($string, '/');
    }
}

if (! function_exists('guarantee_trailing_character')) {
    /**
     * Adds a trailing character.
     */
    function guarantee_trailing_character(string $string, string $character = ' '): string
    {
        if (strrev($string)[0] !== $character) {
            return $string.$character;
        }

        return $string;
    }
}

if (! function_exists('guarantee_trailing_slash')) {
    /**
     * Flashes a message to the session.
     */
    function guarantee_trailing_slash(string $string): string
    {
        return guarantee_trailing_character($string, '/');
    }
}
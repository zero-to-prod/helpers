<?php

use Carbon\Carbon;

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
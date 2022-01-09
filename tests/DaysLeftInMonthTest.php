<?php

it('returns the days left in the month', function () {
    $date               = new DateTime();
    $lastDayOfThisMonth = new DateTime('last day of this month');

    expect((int) $lastDayOfThisMonth->diff($date)->format('%a days'))->toBe(days_left_in_month());
});

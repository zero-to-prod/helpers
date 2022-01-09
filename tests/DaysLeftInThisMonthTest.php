<?php

it('returns the days left in this month', function () {
    $date  = new DateTime();
    $month = new DateTime('last day of this month');

    expect((int) $month->diff($date)->format('%a days'))->toBe(days_left_in_this_month());
});

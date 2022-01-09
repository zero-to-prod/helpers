<?php

it('returns the days left in the month passing no arguments', function () {
    $date  = new DateTime();
    $month = new DateTime('last day of this month');

    expect((int) $month->diff($date)->format('%a days'))->toBe(days_left_in_month());
});

it('returns the days left in the month passing date arguments', function () {
    $date  = new DateTime();
    $month = new DateTime('last day of this month');

    expect((int) $month->diff($date)->format('%a days'))->toBe(days_left_in_month($date));
});

it('returns the days left in the month passing month arguments', function () {
    $month = new DateTime('last day of this month');

    expect((int) $month->diff(new DateTime())->format('%a days'))->toBe(days_left_in_month(month: $month));
});

it('returns the days left in the month passing all arguments', function () {
    $date  = new DateTime();
    $month = new DateTime('last day of this month');

    expect((int) $month->diff($date)->format('%a days'))->toBe(days_left_in_month($date, $month));
});
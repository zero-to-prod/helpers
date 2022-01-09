<?php

use Illuminate\Support\Carbon;

it('is equivalent to diffForHumans', function () {
    $carbon = now();
    expect(diff_for_humans($carbon))->toBe(Carbon::parse($carbon)->diffForHumans());
});

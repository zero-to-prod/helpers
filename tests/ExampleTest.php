<?php

use Illuminate\Support\Carbon;

it('can test', function () {
    $carbon = now();
    expect(diff_for_humans($carbon))->toBe(Carbon::parse($carbon)->diffForHumans());
});

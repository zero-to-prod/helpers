<?php

use ZeroToProd\LaravelHelpers\AttributeCast;

it('returns boolean', function () {
    expect(AttributeCast::boolean)->toBe('boolean');
});
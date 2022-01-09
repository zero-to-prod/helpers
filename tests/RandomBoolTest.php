<?php

it('returns 1 or 0', function () {
    expect(random_bool())->toBeLessThanOrEqual(1)->toBeGreaterThanOrEqual(0);
});

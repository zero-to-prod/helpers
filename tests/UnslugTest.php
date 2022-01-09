<?php

it('returns an unslug version of a string', function () {
    expect(unslug('slug_subject'))->toBe('slug subject');
});

it('returns an unslug version of a string with a specified separator', function () {
    expect(unslug('slug-subject', '-'))->toBe('slug subject');
});
<?php

it('returns slug version of a string', function () {
    expect(slug('slug subject'))->toBe('slug_subject');
});

it('returns slug version of a string with a specified separator', function () {
    expect(slug('slug subject', '-'))->toBe('slug-subject');
});
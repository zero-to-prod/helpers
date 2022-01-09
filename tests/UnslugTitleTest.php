<?php

it('returns an unslug version of a string with the first work capitalized', function () {
    expect(unslug_title('slug_subject'))->toBe('Slug subject');
});

it('returns slug version of a string with a specified separator in title case', function () {
    expect(unslug_title('slug-subject', '-', true))->toBe('Slug Subject');
});
<?php

it('guarantees a trailing slash', function () {
    expect(guarantee_trailing_slash('http://localhost'))->toBe('http://localhost/');
});

it('guarantees a trailing character that exists', function () {
    expect(guarantee_trailing_slash('http://localhost/'))->toBe('http://localhost/');
});
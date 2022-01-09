<?php

it('guarantees a trailing character', function () {
    expect(guarantee_trailing_character('foo', 'b'))->toBe('foob');
});

it('guarantees a trailing character that exists', function () {
    expect(guarantee_trailing_character('foo', 'o'))->toBe('foo');
});
<?php

it('removes a trailing character', function () {
    expect(remove_trailing_character('foo', 'o'))->toBe('fo');
});

it('does not remove a character that is not specified', function () {
    expect(remove_trailing_character('foo', 'f'))->toBe('foo');
});
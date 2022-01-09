<?php

it('removes a trailing character', function () {
    expect(remove_trailing_slash('http://localhost/'))->toBe('http://localhost');
});
<?php

it('returns 1 quoted string', function () {
    expect(array_to_string_in_quotes(['1']))->toBe("'1'");
});

it('returns 2 quoted strings', function () {
    expect(array_to_string_in_quotes(['1', '2']))->toBe("'1', '2'");
});

it('returns 2 quoted strings in double quotes', function () {
    expect(array_to_string_in_quotes(['1', '2'], true))->toBe('"1", "2"');
});
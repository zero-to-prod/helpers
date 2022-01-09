<?php

$array = ['id' => 0, 'value' => 1];
it('returns 0 from array', function () use ($array) {
    expect(get_item($array))->toBe(0);
});
it('returns 1 from array', function () use ($array) {
    expect(get_item($array, 'value'))->toBe(1);
});
it('returns null from array', function () use ($array) {
    expect(get_item($array, 'value_2'))->toBeNull();
});
it('returns default value from array', function () use ($array) {
    expect(get_item($array, 'value_2', 'a'))->toBe('a');
});

$collection          = new stdClass();
$collection->id      = 0;
$collection->value   = 1;

it('returns 0 from class', function () use ($collection) {
    expect(get_item($collection))->toBe(0);
});
it('returns 1 from class', function () use ($collection) {
    expect(get_item($collection, 'value'))->toBe(1);
});
it('returns null from class', function () use ($collection) {
    expect(get_item($collection, 'value_2'))->toBeNull();
});
it('returns default value from class', function () use ($collection) {
    expect(get_item($collection, 'value_2', 'a'))->toBe('a');
});


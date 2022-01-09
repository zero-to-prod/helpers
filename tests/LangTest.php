<?php

use Illuminate\Support\Facades\Config;

it('returns the app locale', function () {
    expect(locale())->toBe('en');
});

it('returns the app locale when es', function () {
    Config::set('app.locale', 'es');
    expect(locale())->toBe('es');
});

it('changes snake_case to kebab-case', function () {
    Config::set('app.locale', 'af_ZA');
    expect(locale())->toBe('af-ZA');
});
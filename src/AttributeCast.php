<?php

namespace ZeroToProd\LaravelHelpers;

use Illuminate\Database\Eloquent\Casts\AsStringable;

class AttributeCast
{
    public const array = 'array';
    public const as_stringable = AsStringable::class;
    public const boolean = 'boolean';
    public const collection = 'collection';
    public const date = 'date';
    public const datetime = 'datetime';
    public const immutable_date = 'immutable_date';
    public const immutable_datetime = 'immutable_datetime';
    public const decimal = 'decimal: ';
    public const double = 'double';
    public const encrypted = 'encrypted';
    public const encrypted_array = 'encrypted:array';
    public const encrypted_collection = 'encrypted:collection';
    public const encrypted_object = 'encrypted:object';
    public const float = 'float';
    public const integer = 'integer';
    public const object = 'object';
    public const real = 'real';
    public const string = 'string';
    public const timestamp = 'timestamp';
}
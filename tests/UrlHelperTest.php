<?php

use ZeroToProd\LaravelHelpers\UrlHelper;

/* UrlHelper::isValid()*/
it('checks invalid url', function () {
    expect(UrlHelper::isValid('www.domain.com'))->toBeFalse();
});

it('checks valid url', function () {
    expect(UrlHelper::isValid('http://www.domain.com'))->toBeTrue();
});

it('checks malformed url', function () {
    expect(UrlHelper::isValid('http//domain.com'))->toBeFalse();
});

/* UrlHelper::isInvalid() */
it('checks !invalid url', function () {
    expect(UrlHelper::isInvalid('www.domain.com'))->toBeTrue();
});
it('checks !valid url', function () {
    expect(UrlHelper::isInvalid('http://www.domain.com'))->toBeFalse();
});
$scheme     = 'http';
$domain     = 'www.domain.com';
$path       = '/path';
$url        = "{$scheme}://{$domain}{$path}";
$parsed_url = UrlHelper::parse($url);

/* UrlHelper::parse() */
it('parses scheme', function () use ($parsed_url, $scheme) {
    expect($scheme)->toBe($parsed_url['scheme']);
});

it('parses host', function () use ($parsed_url, $domain) {
    expect($domain)->toBe($parsed_url['host']);
});

it('parses path', function () use ($parsed_url, $path) {
    expect($path)->toBe($parsed_url['path']);
});

it('does not parse invalid path', function () use ($parsed_url, $path) {
    expect(UrlHelper::parse('http:://www.domain.com/path'))->toBeFalse();
});

/* UrlHelper::getScheme() */
it('gets the url scheme', function () {
    $scheme = 'http';
    $url    = "{$scheme}://www.domain.com/path";
    expect($scheme)->toBe(UrlHelper::getScheme($url));
});

/* UrlHelper::getHost() */
it('gets the url host', function () {
    $host = 'www.domain.com';
    $url  = "http://{$host}/path";
    expect($host)->toBe(UrlHelper::getHost($url));
});

/* UrlHelper::getPort() */
it('returns null getting a url with no port', function () {
    $url = 'http4://username:password@hostname:/path?arg=value#anchor';
    expect(UrlHelper::getPort($url))->toBeNull();
});

it('gets port 9000', function () {
    $port = 9000;
    $url  = "http://username:password@hostname:{$port}/path?arg=value#anchor";
    expect(UrlHelper::getPort($url))->toBe($port);
});

it('gets port 80', function () {
    $scheme = 'http';
    $url    = "{$scheme}://website.domain";
    expect(UrlHelper::getPort($url))->toBe(80);
});

it('gets port 443', function () {
    $scheme = 'https';
    $url    = "{$scheme}://website.domain";
    expect(UrlHelper::getPort($url))->toBe(443);
});

it('gets port 21', function () {
    $scheme = 'ftp';
    $url    = "{$scheme}://website.domain";
    expect(UrlHelper::getPort($url))->toBe(21);
});

it('gets port 990', function () {
    $scheme = 'ftps';
    $url    = "{$scheme}://website.domain";
    expect(UrlHelper::getPort($url))->toBe(990);
});

/* UrlHelper::getUser() */
it('returns null when no user present in url', function () {
    $username = null;
    $url      = "http://{$username}:password@hostname:/path?arg=value#anchor";
    expect(UrlHelper::getUser($url))->toBeNull();
});

it('gets the user of a url', function () {
    $username = 'username';
    $url      = "http://{$username}:password@hostname:9000/path?arg=value#anchor";
    expect(UrlHelper::getUser($url))->toBe($username);
});

/* UrlHelper::getPass() */
it('returns null when no password is present in url', function () {
    $password = null;
    $url      = "http://username:{$password}@hostname:/path?arg=value#anchor";
    expect(UrlHelper::getPass($url))->toBeNull();
});

it('get password from url', function () {
    $password = 'password';
    $url      = "http://username:{$password}@hostname:/path?arg=value#anchor";
    expect(UrlHelper::getPass($url))->toBe($password);
});

/* UrlHelper::getPath() */
it('returns null when no path is present in url', function () {
    $path = '/';
    $url  = "http://username:password@hostname:{$path}?arg=value#anchor";
    expect(UrlHelper::getPath($url))->toBeNull();
});

it('get path from url', function () {
    $path = '/path';
    $url  = "http://username:password@hostname:{$path}?arg=value#anchor";
    expect(UrlHelper::getPath($url))->toBe($path);
});

/* UrlHelper::getQuery() */
it('returns null when no query is present in url', function () {
    $query = null;
    $url   = "http://username:password@hostname:/path?{$query}#anchor";
    expect(UrlHelper::getQuery($url))->toBeNull();
});

it('get query from url', function () {
    $query = 'query=value';
    $url   = "http://username:password@hostname:/path?{$query}#anchor";
    expect(UrlHelper::getQuery($url))->toBe($query);
});

/* UrlHelper::getFragment() */
it('returns null when no fragment is present in url', function () {
    $fragment = null;
    $url      = "http://username:password@hostname:9090/path?arg=value#{$fragment}";
    expect(UrlHelper::getFragment($url))->toBeNull();
});

it('get fragment from url', function () {
    $fragment = 'fragment';
    $url      = "http://username:password@hostname:9090/path?arg=value#{$fragment}";
    expect(UrlHelper::getFragment($url))->toBe($fragment);
});
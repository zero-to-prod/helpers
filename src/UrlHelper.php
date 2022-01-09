<?php

namespace ZeroToProd\LaravelHelpers;

class UrlHelper
{
    /**
     * Checks if url is valid.
     */
    public static function isValid(string $url): bool
    {
        $path         = parse_url($url, PHP_URL_PATH);
        $encoded_path = array_map('urlencode', explode('/', $path));
        $url          = str_replace($path, implode('/', $encoded_path), $url);

        return (bool) filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Checks if url is invalid
     */
    public static function isInvalid(string $url): bool
    {
        return ! self::isValid($url);
    }

    /**
     * Parses url.
     */
    public static function parse($url): mixed
    {
        return ! self::isValid($url) ? false : parse_url($url);
    }

    /**
     * Ges the url scheme.
     */
    public static function getScheme(string $url): string
    {
        return self::parse($url)['scheme'];
    }

    /**
     * Gets the url host.
     */
    public static function getHost(string $url): string
    {
        return self::parse($url)['host'];
    }

    /**
     * Gets the port of a url.
     */
    public static function getPort(string $url): ?int
    {
        $port = self::parse($url)['port'] ?? null;

        return $port ?? match (self::parse($url)['scheme']) {
                'http' => 80,
                'https' => 443,
                'ftp' => 21,
                'ftps' => 990,
                default => null,
            };
    }

    /**
     * Gets the user of a url.
     */
    public static function getUser(string $url): string|null
    {
        $user = self::parse($url)['user'];

        return $user === '' ? null : $user;
    }

    /**
     * Gets the password of a url.
     */
    public static function getPass(string $url): string|null
    {
        $pass = self::parse($url)['pass'];

        return $pass === '' ? null : $pass;
    }

    /**
     * Gets the path of a url.
     */
    public static function getPath(string $url = '/'): string|null
    {
        $path = self::parse($url)['path'];

        return $path === '/' ? null : $path;
    }

    /**
     * Gets the query of a url.
     */
    public static function getQuery(string $url): string|null
    {
        $query = self::parse($url)['query'];

        return $query === '' ? null : $query;
    }

    /**
     * Gets the fragment of a url.
     */
    public static function getFragment(string $url): string|null
    {
        $query = self::parse($url)['fragment'];

        return $query === '' ? null : $query;
    }
}

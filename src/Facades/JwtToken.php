<?php

namespace Webguosai\JwtToken\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webguosai\JwtToken\Services\JwtToken
 *
 * @method static mixed getJwtToken()
 * @method static mixed getJwtTokenQuery(string $keyName = 'token')
 * @method static mixed getJwtTokenHeader(string $keyName = 'HTTP_AUTHORIZATION')
 */
class JwtToken extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'JwtToken';
    }
}


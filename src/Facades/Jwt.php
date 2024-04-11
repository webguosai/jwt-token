<?php

namespace Webguosai\JwtToken\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webguosai\JwtToken\Services\Jwt
 *
 * @method static string encode($data, int $exp = 3600, string $iss = null, string $aud = null)
 * @method static mixed|null decode(string $jwt)
 */
class Jwt extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Jwt';
    }
}

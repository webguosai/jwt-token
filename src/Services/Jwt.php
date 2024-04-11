<?php

namespace Webguosai\JwtToken\Services;

use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;

class Jwt
{
    protected $alg = 'HS256';
    protected $key;
    protected $domain;

    /**
     * @param string $key
     * @param string $domain
     */
    public function __construct(string $key, string $domain = '')
    {
        $this->key    = $key;
        $this->domain = $domain;
    }

    /**
     * 加密
     * @param mixed $data
     * @param int $exp
     * @param string|null $iss
     * @param string|null $aud
     * @return string
     */
    public function encode($data, int $exp = 3600, string $iss = null, string $aud = null): string
    {
        $time  = time();
        $token = [
            // jwt签发者
            "iss"  => $iss ?: $this->domain,
            // 接收jwt的一方
            "aud"  => $aud ?: $this->domain,
            // jwt的签发时间
            "iat"  => $time,
            // 定义在什么时间之前，该jwt都是不可用的
            "nbf"  => $time,
            'data' => serialize($data)
        ];
        if ($exp) {
            $token['exp'] = $time + $exp;
        }
        return \Firebase\JWT\JWT::encode($token, $this->key, $this->alg);
    }

    /**
     * 解码
     * @param string $jwt
     * @return mixed|null
     */
    public function decode(string $jwt)
    {
        try {
            $params = \Firebase\JWT\JWT::decode($jwt, new Key($this->key, $this->alg));
            return unserialize($params->data);
        } catch (ExpiredException $e) {
            // 过期
            throw new ExpiredException();
        } catch (Exception $e) {
            return null;
        }
    }
}

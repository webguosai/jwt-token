<?php

namespace Webguosai\JwtToken\Services;

class JwtToken
{
    /**
     * 获取jwt数据
     * @return mixed
     */
    public function getJwtToken()
    {
        $jwt = $this->getJwtTokenQuery();

        if (empty($jwt)) {
            $jwt = $this->getJwtTokenHeader();
        }

        return $jwt;
    }

    /**
     * 从query中获取jwt数据
     * @param string $keyName
     * @return mixed|string
     */
    public function getJwtTokenQuery(string $keyName = 'token')
    {
        return empty($_REQUEST[$keyName]) ? '' : $_REQUEST[$keyName];
    }

    /**
     * 从header中获取jwt数据
     * @param string $keyName
     * @return mixed
     */
    public function getJwtTokenHeader(string $keyName = 'HTTP_AUTHORIZATION')
    {
        $jwt = '';

        $value = empty($_SERVER[$keyName]) ? '' : $_SERVER[$keyName];
        if (!empty($value)) {
            $jwt = str_ireplace('Bearer ', '', $value);
        }

        return $jwt;
    }

}

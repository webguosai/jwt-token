<?php

namespace Webguosai\JwtToken\Services;

class JwtToken
{
    protected $queryKey = 'token';
    protected $pre = 'Bearer ';

    /**
     * 获取jwt数据
     * @return mixed
     */
    public function getJwtToken()
    {
        $jwt = $this->getJwtTokenQuery();

        if (is_null($jwt)) {
            $jwt = $this->getJwtTokenHeader();
        }

        return $jwt;
    }

    /**
     * 从query中获取jwt数据
     * @return mixed|null
     */
    public function getJwtTokenQuery()
    {
        return empty($_GET[$this->queryKey]) ? null : $_GET[$this->queryKey];
    }

    /**
     * 从header中获取jwt数据
     * @return mixed
     */
    public function getJwtTokenHeader()
    {
        $jwt = null;

        $value = $_SERVER['HTTP_AUTHORIZATION'];
        if (!empty($value)) {
            $jwt = str_ireplace($this->pre, '', $value);
        }

        return $jwt;
    }

}

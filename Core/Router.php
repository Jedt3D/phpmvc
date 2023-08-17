<?php

/**
 *
 */
class Router
{
    /**
     * Associative Array ของ routing table
     * @var array
     */
    protected $routes = [];

    /**
     * parameter จาก matched route
     * @var array
     */
    protected $params = [];

    /**
     * เพิ่ม route ไปให้ routing table
     * @param string $route ตัว route url
     * @param array $params parameters (controller, action, etc.)
     * @return void
     */
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * get ค่า route ทั้งหมดจาก routing table
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * ให้ match route ที่มีใน table เข้ากับ query string url ที่ส่งมา
     * ทาง $params และบอกว่าเจอหรือไม่
     * @param string $url ตัว query string จาก url
     * @return bool return True ถ้าเจอ
     */
    public function match($url)
    {
        /*        foreach ($this->routes as $route => $params) {
                    if ($url == $route) {
                        $this->params = $params;
                        return true;
                    }
                }*/
        $reg_exp = '/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/';
        if (preg_match($reg_exp, $url, $matches)) {
            $params = [];
            foreach ($matches as $key => $match) {
                if (is_string($key)) {
                    $params[$key] = $match;
                }
            }
            $this->params = $params;
            return true;
        }
        return false;
    }

    public function getParams()
    {
        return $this->params;
    }

}

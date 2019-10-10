<?php


namespace App\Http\Controller;

use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use App\Http\Middleware\LoginMiddleware;

/**
 * 权限管理
 * @package App\Http\Controller
 * @Controller()
 * @Middlewares({
 *      @Middleware(LoginMiddleware::class),
 * })
 */
class AuthorityController
{
    /**
     * 权限列表
     * @RequestMapping("/authority")
     */
    public function index()
    {

    }

    /**
     * 获取控制器 + 路由信息的树结构
     */
    public function getTree()
    {

    }
}

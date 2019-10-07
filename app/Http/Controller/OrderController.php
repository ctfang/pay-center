<?php


namespace App\Http\Controller;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use App\Http\Middleware\LoginMiddleware;

/**
 * 订单管理
 * @package App\Http\Controller
 * @Controller()
 * @Middlewares({
 *      @Middleware(LoginMiddleware::class),
 * })
 */
class OrderController
{

}

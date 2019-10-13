<?php


namespace App\Http\Controller;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * 公开的无限制控制
 * @package App\Http\Controller
 * @Controller()
 */
class PublicController
{
    /**
     * @RequestMapping("/favicon.ico",method={RequestMethod::GET})
     * @throws \Swoft\Exception\SwoftException
     */
    public function tt()
    {
        return context()->getResponse()->withStatus(404);
    }
}

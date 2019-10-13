<?php


namespace App\Http\Controller;

use App\Model\Entity\AdminRole;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use App\Http\Middleware\LoginMiddleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * 角色管理
 * @package App\Http\Controller
 * @Controller()
 * @Middlewares({
 *      @Middleware(LoginMiddleware::class),
 * })
 */
class RoleController
{
    /**
     * 角色列表
     * @RequestMapping("/role",method={RequestMethod::GET})
     * @param Request $request
     * @return \Swoft\Http\Message\Response
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        return view("role/list");
    }

    /**
     * 角色列表
     * @RequestMapping("/role/list",method={RequestMethod::GET})
     * @param Request $request
     * @return array
     * @throws \Throwable
     */
    public function lists(Request $request)
    {
        $page = (int)$request->get('page',1);
        $limit = (int)$request->get('limit',1);
        $data = AdminRole::paginate($page,$limit);

        return [
            "code"=>0,
            'count'=>$data['count'],
            'data'=>$data['list'],
            'msg'=>'',
        ];
    }

    /**
     * 新增角色GET
     * @RequestMapping("/role/create",method={RequestMethod::GET})
     */
    public function add()
    {
        return view("role/add");
    }

    /**
     * 新增角色POST
     * @RequestMapping("/role/create",method={RequestMethod::POST})
     * @param Request $request
     * @return string
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function create(Request $request)
    {
        AdminRole::new($request->post())->save();

        return "OK";
    }

    /**
     * 编辑角色GET
     * @RequestMapping("/role/edit",method={RequestMethod::GET})
     * @param Request $request
     * @return string
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     * @throws \Throwable
     */
    public function update(Request $request)
    {
        return view('role/edit');
    }

    /**
     * 编辑角色POST
     * @RequestMapping("/role/edit",method={RequestMethod::POST})
     * @param Request $request
     * @return string
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function edit(Request $request)
    {
        AdminRole::where('id','=',(int)$request->get('id',0))->update($request->post());

        return "OK";
    }


    /**
     * 删除角色POST
     * @RequestMapping("/role/delete",method={RequestMethod::POST})
     * @param Request $request
     * @return string
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function delete(Request $request)
    {
        AdminRole::where('id','=',(int)$request->post('id',0))->delete();

        return "OK";
    }
}

<?php


namespace App\Http\Controller;

use App\Model\Entity\AdminNav;
use App\Model\Entity\IconFont;
use Swoft;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use App\Http\Middleware\LoginMiddleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Server\Router\Router;

/**
 * 菜单管理
 * @package App\Http\Controller
 * @Controller()
 * @Middlewares({
 *      @Middleware(LoginMiddleware::class),
 * })
 */
class MenuController
{
    /**
     * 菜单列表
     * @RequestMapping("/nav",method={RequestMethod::GET})
     * @throws \Throwable
     */
    public function index()
    {
        $data['list'] = [];
        $rows = AdminNav::get();
        if ($rows) {
            $data['list'] = $this->getList($rows->toArray());
            foreach ($data['list'] as $key => $datum) {
                if ($datum['pid']) {
                    $prow = AdminNav::find($datum['pid']);
                    if ($prow) {
                        $data['list'][$key]['pname'] = $prow->getName();
                    }
                    $data['list'][$datum['pid']]['child'] = 1;
                } else {
                    $data['list'][$key]['pname'] = "";
                }
            }
        }

        return view("nav/list", $data);
    }

    private function getList($rows)
    {
        $list = [];
        foreach ($rows as $row) {
            $list[$row['id']] = $row;
        }
        return $list;
    }

    /**
     * 菜单新增界面
     * @RequestMapping("/nav/create",method={RequestMethod::GET})
     */
    public function add()
    {
        $data['paths'] = $this->getNavPath();
        $data['icons'] = IconFont::get();
        $data['navs'] = AdminNav::orderBy('pid')->orderBy('order')->get();

        return view("nav/add", $data);
    }

    /**
     * @RequestMapping("/nav/create",method={RequestMethod::POST})
     * @param Request $request
     * @return string
     * @throws Swoft\Bean\Exception\ContainerException
     * @throws Swoft\Db\Exception\DbException
     * @throws \ReflectionException
     */
    public function create(Request $request)
    {
        $row = AdminNav::new($request->post());
        $row->save();

        return "OK";
    }

    /**
     * @RequestMapping("/nav/edit",method={RequestMethod::GET})
     * @param Request $request
     * @return string
     * @throws Swoft\Bean\Exception\ContainerException
     * @throws Swoft\Db\Exception\DbException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function edit(Request $request)
    {
        $data['info'] = AdminNav::find($request->get('id'));
        $data['paths'] = $this->getNavPath();
        $data['icons'] = IconFont::get();
        $data['navs'] = AdminNav::orderBy('pid')->orderBy('order')->get();

        return view("nav/edit", $data);
    }

    private function getNavPath()
    {
        /** @var Router $router */
        $router = Swoft::getBean('httpRouter');
        $paths = [];
        foreach ($router->getRoutes() as $item) {
            if (strpos($item['handler'], "App\\Http") !== 0) {
                continue;
            }
            if (strpos($item['method'], 'GET') !== false) {
                $paths[] = [
                    'path' => $item['path'],
                ];
            }
        }
        return $paths;
    }

    /**
     * @RequestMapping("/nav/edit",method={RequestMethod::POST})
     * @param Request $request
     * @return string
     * @throws Swoft\Bean\Exception\ContainerException
     * @throws Swoft\Db\Exception\DbException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function update(Request $request)
    {
        $id = (int)$request->get('id');
        AdminNav::where('id', '=', $id)->update($request->post());

        return "OK";
    }

    /**
     * @RequestMapping("/nav/delete",method={RequestMethod::POST})
     * @param Request $request
     * @return string
     * @throws Swoft\Bean\Exception\ContainerException
     * @throws Swoft\Db\Exception\DbException
     * @throws \ReflectionException
     */
    public function delete(Request $request)
    {
        $id = (int)$request->post('id');
        AdminNav::where('id', '=', $id)->delete();
        return "OK";
    }
}

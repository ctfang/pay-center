<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Model\Entity\AdminNav;
use Swoft;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\View\Renderer;
use Throwable;
use function context;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index()
    {
        $data['left'] = $this->getLeftNav();
        $data['top'] = $this->getTopNav();

        return view('home/index', $data);
    }

    /**
     * 获取菜单
     * @return array
     * @throws Swoft\Db\Exception\DbException
     */
    private function getLeftNav(): array
    {
        $rows = AdminNav::where('type','=','middle')->orderBy('order')->get();
        if ($rows) {
            $rows = $rows->toArray();
            return $this->toTree($rows);
        } else {
            return [];
        }
    }

    /**
     * 获取菜单
     * @return array
     * @throws Swoft\Db\Exception\DbException
     */
    private function getTopNav(): array
    {
        $rows = AdminNav::where('type','=','top')->orderBy('order')->get();
        if ($rows) {
            $rows = $rows->toArray();
            return $this->toTree($rows);
        } else {
            return [];
        }
    }

    /**
     * 把返回的数据集转换成Tree
     * @param array $list 要转换的数据集
     * @param string $pk
     * @param string $pid parent标记字段
     * @param string $child
     * @param int $root
     * @return array
     */
    function toTree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
    {
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }

            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }

    /**
     * 首页统计
     * @RequestMapping("/home",method={RequestMethod::GET})
     */
    public function home()
    {
        $data['left'] = $this->getLeftNav();
        $data['top'] = $this->getTopNav();

        return view('home/home', $data);
    }
}

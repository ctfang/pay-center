<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddNavTable
 *
 * @since 2.0
 *
 * @Migration(time=20191004230111)
 */
class AddNavTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin_nav', function (Blueprint $blueprint) {
            $blueprint->comment('菜单表');

            $blueprint->increments('id')->comment('主键');
            $blueprint->unsignedInteger('pid')->default(0)->comment('上级菜单');
            $blueprint->string("path", 60)->comment("地址,地址只能GET");
            $blueprint->string("type",15)->comment("处于导航栏的位置，top为顶部；middle为中间；bottom,为底部");
            $blueprint->string("name", 30)->comment("名字");
            $blueprint->string("icon", 30)->comment("图标");
            $blueprint->unsignedTinyInteger("order")->default(1)->comment("排序 ，数字越大越靠后");
            $blueprint->unsignedTinyInteger("enabled")->default(1)->comment("0关1开");

            $blueprint->integer('created_at')->default('0')->comment('create time');
            $blueprint->integer('updated_at')->default('0')->comment('update timestamp');
        });
    }

    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function down(): void
    {
        $this->schema->dropIfExists('admin_nav');
    }
}

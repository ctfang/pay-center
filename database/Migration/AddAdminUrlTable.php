<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * url权限
 *
 * @since 2.0
 *
 * @Migration(time=20191004230026)
 */
class AddAdminUrlTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin_url', function (Blueprint $blueprint) {
            $blueprint->comment('地址表，权限');

            $blueprint->increments('id')->comment('主键');
            $blueprint->string("url", 60)->comment("路由地址 /home");
            $blueprint->string("method", 10)->comment("method");
            $blueprint->string("path", 70)->comment("地址 GET@/home 能完整表达 method@url");

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
        $this->schema->dropIfExists("admin_url");
    }
}

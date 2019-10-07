<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddAdminRoleNavTable
 *
 * @since 2.0
 *
 * @Migration(time=20191005020220)
 */
class AddAdminRoleNavTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin_role_nav', function (Blueprint $blueprint) {
            $blueprint->comment('管理角色菜单');

            $blueprint->unsignedInteger("role_id")->comment("管理角色id");
            $blueprint->unsignedInteger("nav_id")->comment("菜单id");
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
        $this->schema->dropIfExists("admin_role_nav");
    }
}

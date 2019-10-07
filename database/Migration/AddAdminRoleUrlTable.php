<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddAdminRoleUrlTable
 *
 * @since 2.0
 *
 * @Migration(time=20191005015150)
 */
class AddAdminRoleUrlTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin_role_url', function (Blueprint $blueprint) {
            $blueprint->comment('管理角色管理权限');

            $blueprint->unsignedInteger("role_id")->comment("管理角色id");
            $blueprint->string("path",100)->comment("method@url");
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
        $this->schema->dropIfExists('admin_role_url');
    }
}

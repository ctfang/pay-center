<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddAdminRoleTable
 *
 * @since 2.0
 *
 * @Migration(time=20191005013525)
 */
class AddAdminRoleTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin_role', function (Blueprint $blueprint) {
            $blueprint->comment('管理角色');

            $blueprint->increments('id')->comment('主键');
            $blueprint->string("name", 30)->comment("名字");
            $blueprint->unsignedTinyInteger("enabled")->default(1)->comment("0关1开");
            $blueprint->string("desc")->comment("备注说明");

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
        $this->schema->dropIfExists('admin_role');
    }
}

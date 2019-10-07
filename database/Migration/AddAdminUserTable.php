<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddAdminUserTable
 *
 * @since 2.0
 *
 * @Migration(time=20191004230047)
 */
class AddAdminUserTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin_user', function (Blueprint $blueprint) {
            $blueprint->comment('管理员表');

            $blueprint->increments('user_id')->comment('主键');
            $blueprint->string('name')->comment('名字');
            $blueprint->unsignedTinyInteger('enable')->comment('1开0关');

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
        $this->schema->dropIfExists("admin_user");
    }
}

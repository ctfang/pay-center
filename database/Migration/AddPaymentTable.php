<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddPaymentTable
 *
 * @since 2.0
 *
 * @Migration(time=20191004230135)
 */
class AddPaymentTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('payment', function (Blueprint $blueprint) {
            $blueprint->comment('安装的支付方式配置信息');

            $blueprint->increments('pay_id')->comment('主键');
            $blueprint->string("pay_code", 30)->comment("支付方式的英文缩写,关联程序");
            $blueprint->string("pay_name",30)->comment("支付方式名称");
            $blueprint->string("pay_fee", 30)->comment("手续费");
            $blueprint->text("pay_desc")->comment("支付方式描述");
            $blueprint->unsignedTinyInteger("pay_order")->default(1)->comment("排序 ，数字越大越靠后");
            $blueprint->text("pay_config")->comment("支付方式的配置信息，包括商户号和密钥什么的");
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
        $this->schema->dropIfExists('payment');
    }
}

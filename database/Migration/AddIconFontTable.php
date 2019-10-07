<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\DB;
use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class AddIconFontTable
 *
 * @since 2.0
 *
 * @Migration(time=20191005145502)
 */
class AddIconFontTable extends BaseMigration
{
    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('icon_font', function (Blueprint $blueprint) {
            $blueprint->comment('图标');

            $blueprint->increments('id')->comment('主键');
            $blueprint->string('name')->comment('名字');
            $blueprint->string('code')->comment('code');

            $blueprint->integer('created_at')->default('0')->comment('create time');
            $blueprint->integer('updated_at')->default('0')->comment('update timestamp');
        });

        $json = "[[\"all\",\"&#xe696;\"],[\"back\",\"&#xe697;\"],[\"cart\",\"&#xe698;\"],[\"Category\",\"&#xe699;\"],[\"close\",\"&#xe69a;\"],[\"comments\",\"&#xe69b;\"],[\"cry\",\"&#xe69c;\"],[\"delete\",\"&#xe69d;\"],[\"edit\",\"&#xe69e;\"],[\"email\",\"&#xe69f;\"],[\"favorite\",\"&#xe6a0;\"],[\"form\",\"&#xe6a2;\"],[\"help\",\"&#xe6a3;\"],[\"information\",\"&#xe6a4;\"],[\"less\",\"&#xe6a5;\"],[\"more_unfold\",\"&#xe6a6;\"],[\"more\",\"&#xe6a7;\"],[\"pic\",\"&#xe6a8;\"],[\"QRCode\",\"&#xe6a9;\"],[\"refresh\",\"&#xe6aa;\"],[\"RFQ\",\"&#xe6ab;\"],[\"search\",\"&#xe6ac;\"],[\"selected\",\"&#xe6ad;\"],[\"set\",\"&#xe6ae;\"],[\"Smile\",\"&#xe6af;\"],[\"success\",\"&#xe6b1;\"],[\"survey\",\"&#xe6b2;\"],[\"training\",\"&#xe6b3;\"],[\"ViewGallery\",\"&#xe6b4;\"],[\"Viewlist\",\"&#xe6b5;\"],[\"warning\",\"&#xe6b6;\"],[\"wrong\",\"&#xe6b7;\"],[\"account\",\"&#xe6b8;\"],[\"add\",\"&#xe6b9;\"],[\"atm\",\"&#xe6ba;\"],[\"clock\",\"&#xe6bb;\"],[\"remind\",\"&#xe6bc;\"],[\"calendar\",\"&#xe6bf;\"],[\"attachment\",\"&#xe6c0;\"],[\"discount\",\"&#xe6c5;\"],[\"service\",\"&#xe6c7;\"],[\"print\",\"&#xe6c9;\"],[\"box\",\"&#xe6cb;\"],[\"process\",\"&#xe6ce;\"],[\"beauty\",\"&#xe6d2;\"],[\"electrical\",\"&#xe6d4;\"],[\"home\",\"&#xe6d7;\"],[\"electronics\",\"&#xe6da;\"],[\"gifts\",\"&#xe6db;\"],[\"lights\",\"&#xe6de;\"],[\"sports\",\"&#xe6e0;\"],[\"toys\",\"&#xe6e1;\"],[\"auto\",\"&#xe6e3;\"],[\"jewelry\",\"&#xe6e4;\"],[\"trade-assurance\",\"&#xe6e5;\"],[\"browse\",\"&#xe6e6;\"],[\"rfq-qm\",\"&#xe6e7;\"],[\"rfq-quantity\",\"&#xe6e8;\"],[\"atm-away\",\"&#xe6e9;\"],[\"rfq\",\"&#xe6eb;\"],[\"scanning\",\"&#xe6ec;\"],[\"compare\",\"&#xe6ee;\"],[\"filter\",\"&#xe6f1;\"],[\"pin\",\"&#xe6f2;\"],[\"history\",\"&#xe6f3;\"],[\"product-features\",\"&#xe6f4;\"],[\"supplier-features\",\"&#xe6f5;\"],[\"similar-product\",\"&#xe6f6;\"],[\"link\",\"&#xe6f7;\"],[\"cut\",\"&#xe6f8;\"],[\"nav-list\",\"&#xe6fa;\"],[\"image-text\",\"&#xe6fb;\"],[\"text\",\"&#xe6fc;\"],[\"move\",\"&#xe6fd;\"],[\"subtract\",\"&#xe6fe;\"],[\"dollar\",\"&#xe702;\"],[\"raw\",\"&#xe704;\"],[\"office\",\"&#xe705;\"],[\"agriculture\",\"&#xe707;\"],[\"machinery\",\"&#xe709;\"],[\"assessed-Badge\",\"&#xe70a;\"],[\"personal-center\",\"&#xe70b;\"],[\"integral\",\"&#xe70c;\"],[\"operation\",\"&#xe70e;\"],[\"remind\",\"&#xe713;\"],[\"download\",\"&#xe714;\"],[\"map\",\"&#xe715;\"],[\"bad\",\"&#xe716;\"],[\"good\",\"&#xe717;\"],[\"skip\",\"&#xe718;\"],[\"play\",\"&#xe719;\"],[\"stop\",\"&#xe71a;\"],[\"compass\",\"&#xe71b;\"],[\"security\",\"&#xe71c;\"],[\"share\",\"&#xe71d;\"],[\"store\",\"&#xe722;\"],[\"manage-order\",\"&#xe723;\"],[\"rejected-order\",\"&#xe724;\"],[\"phone\",\"&#xe725;\"],[\"bussiness-man\",\"&#xe726;\"],[\"shoes\",\"&#xe728;\"],[\"Mobile-phone\",\"&#xe72a;\"],[\"email-filling\",\"&#xe72d;\"],[\"favorites-filling\",\"&#xe730;\"],[\"account-filling\",\"&#xe732;\"],[\"credit-level\",\"&#xe735;\"],[\"credit-level-filling\",\"&#xe736;\"],[\"exl\",\"&#xe73f;\"],[\"pdf\",\"&#xe740;\"],[\"zip\",\"&#xe741;\"],[\"sorting\",\"&#xe743;\"],[\"copy\",\"&#xe744;\"],[\"save\",\"&#xe747;\"],[\"inquiry-template\",\"&#xe749;\"],[\"template-default\",\"&#xe74a;\"],[\"libra\",\"&#xe74c;\"],[\"survey\",\"&#xe74e;\"],[\"ship\",\"&#xe74f;\"],[\"bussiness-card\",\"&#xe753;\"],[\"hot\",\"&#xe756;\"],[\"data\",\"&#xe757;\"],[\"trade\",\"&#xe758;\"],[\"onepage\",\"&#xe75a;\"],[\"signboard\",\"&#xe75c;\"],[\"shuffling-banner\",\"&#xe75e;\"],[\"component\",\"&#xe75f;\"],[\"component-filling\",\"&#xe760;\"],[\"color\",\"&#xe761;\"],[\"color-filling\",\"&#xe7cd;\"],[\"favorites\",\"&#xe7ce;\"],[\"pic-filling\",\"&#xe802;\"],[\"RFQ\",\"&#xe803;\"],[\"RFQ-filling\",\"&#xe804;\"],[\"original-image\",\"&#xe806;\"],[\"logistic\",\"&#xe811;\"],[\"Calculator\",\"&#xe812;\"],[\"video\",\"&#xe820;\"],[\"earth\",\"&#xe828;\"],[\"task-management\",\"&#xe829;\"],[\"trust\",\"&#xe82a;\"],[\"password\",\"&#xe82b;\"],[\"3column\",\"&#xe839;\"],[\"apparel\",\"&#xe83a;\"],[\"bags\",\"&#xe83b;\"],[\"folder\",\"&#xe83c;\"],[\"4column\",\"&#xe83d;\"],[\"code\",\"&#xe842;\"],[\"RFQ-filling\",\"&#xe843;\"]]";

        $arr = json_decode($json,true);

        foreach ($arr as $item){
            DB::table('icon_font')->insert([
                'name'=>$item[0],
                'code'=>$item[1],
            ]);
        }
    }

    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function down(): void
    {
        $this->schema->dropIfExists("icon_font");
    }
}

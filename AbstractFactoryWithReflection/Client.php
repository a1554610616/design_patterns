<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 2018/10/31
 * Time: 11:32 PM
 */

namespace Allen\DesignPatterns\AbstractFactoryWithReflection;

require __DIR__.'/../vendor/autoload.php';

/**
 * 用反射优化抽象工厂模式
 * Class Client
 * @package Allen\DesignPatterns\AbstractFactoryWithReflection
 */
class Client
{
    public function run()
    {
        $factory = new Factory();
        $obj = $factory->createUser();
        $obj->select();
        $obj->insert();

        $obj2 = $factory->createArticle();
        $obj2->select();
        $obj2->insert();
    }
}

$obj = new Client();
$obj->run();
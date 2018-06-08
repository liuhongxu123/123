<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/1/9
 * Time: 下午1:04
 */

namespace EasySwoole;

use \EasySwoole\Core\AbstractInterface\EventInterface;
use \EasySwoole\Core\Swoole\ServerManager;
use \EasySwoole\Core\Swoole\EventRegister;
use \EasySwoole\Core\Http\Request;
use \EasySwoole\Core\Http\Response;
use App\Utility\MysqlPool;
use EasySwoole\Core\Component\Pool\PoolManager;

Class EasySwooleEvent implements EventInterface {

    public static function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(ServerManager $server,EventRegister $register): void
    {
        // TODO: Implement mainServerCreate() method.
	    // 数据库协程连接池
        // @see https://www.easyswoole.com/Manual/2.x/Cn/_book/CoroutinePool/mysql_pool.html?h=pool
        // ------------------------------------------------------------------------------------------
        // TODO 作用未知，文档没写
        if (version_compare(phpversion('swoole'), '2.1.0', '>=')) {
            PoolManager::getInstance()->registerPool(MysqlPool::class, 3, 10);
        }
    }

    public static function onRequest(Request $request,Response $response): void
    {
        // TODO: Implement onRequest() method.
    }

    public static function afterAction(Request $request,Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}

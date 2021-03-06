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
use \EasySwoole\Core\Swoole\Process\ProcessManager;
use App\Process\Test;
use App\Process\Inotify;
use App\Utility\MysqlPool;
use EasySwoole\Core\Component\Pool\PoolManager;
use think\Db;

Class EasySwooleEvent implements EventInterface {

    public static function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
        // 获得数据库配置
        $dbConf = Config::getInstance()->getConf('database');
        // 全局初始化
        Db::setConfig($dbConf);
    }

    public static function mainServerCreate(ServerManager $server,EventRegister $register): void
    {
        // 天天都在问的服务热重启 单独启动一个进程处理,需要pecl install inotify
        // ------------------------------------------------------------------------------------------
//        ProcessManager::getInstance()->addProcess('autoReload', Inotify::class);
        // TODO: Implement mainServerCreate() method.
        // 创建自定义进程 上面定时器中发送的消息 由 Test 类进行处理
        // @see https://www.easyswoole.com/Manual/2.x/Cn/_book/Advanced/process.html
        // ------------------------------------------------------------------------------------------
        //自定义进程
//        $num = 4;
//        for($i=1;$i<$num;$i++){
             ProcessManager::getInstance()->addProcess("test", Test::class);
//        }
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

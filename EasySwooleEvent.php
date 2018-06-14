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

Class EasySwooleEvent implements EventInterface {

    public static function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(ServerManager $server,EventRegister $register): void
    {
        // TODO: Implement mainServerCreate() method.
        // 创建自定义进程 上面定时器中发送的消息 由 Test 类进行处理
        // @see https://www.easyswoole.com/Manual/2.x/Cn/_book/Advanced/process.html
        // ------------------------------------------------------------------------------------------
        //自定义进程
//        $num = 4;
//        for($i=1;$i<$num;$i++){
//            ProcessManager::getInstance()->addProcess("test$i", Test::class);
//        }
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
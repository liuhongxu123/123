<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Swoole\Task\TaskManager;
use EasySwoole\Core\Swoole\Time\Timer;
/**
 * Class Index
 * @package App\HttpController
 */
class Index extends Controller
{
    /**
     * 首页方法
     * @author : evalor <master@evalor.cn>
     */
    function index()
    {
        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write('<div style="text-align: center;margin-top: 30px"><h2>欢迎使用EASYSWOOLE</h2></div></br>');
        $this->response()->write('<div style="text-align: center">您现在看到的页面是默认的 Index 控制器的输出</div></br>');
        $this->response()->write('<div style="text-align: center"><a href="https://www.easyswoole.com/Manual/2.x/Cn/_book/Base/http_controller.html">查看手册了解详细使用方法</a></div></br>');
    }

    function asy()
    {
        /**
         * 投递一个异步任务
         * @param mixed $task           需要投递的异步任务
         * @param mixed $finishCallback 任务执行完后的回调函数
         * @param int   $taskWorkerId   指定投递的Task进程编号 (默认随机投递给空闲进程)
         * @return bool 投递成功 返回整数 $task_id 投递失败 返回 false
         */
        TaskManager::async(function () {
            echo "执行异步任务...\n";
            return true;
        }, function () {
            echo "异步任务执行完毕...\n";
        });
    }

    function asyTimer()
    {
        // 在定时器中投递的例子
        Timer::loop(1000, function () {
            TaskManager::async(function () {
                echo "执行异步任务...\n";
            });
        });
    }

    /*
     * 并发执行任务
     */
    function task()
    {
        $tasks[] = function () { sleep(1);var_dump(time()); }; // 任务1
        $tasks[] = function () { sleep(2);var_dump(time()); };     // 任务2
        $tasks[] = function () { sleep(3);var_dump(time()); }; // 任务3

        /**
         * 并发执行多个任务
         * @param array $taskList 需要执行的任务列表
         * @param float $timeout  任务执行超时
         * @return array|bool 每个任务的执行结果
         */
        TaskManager::barrier($tasks, 3.5);
    }


}
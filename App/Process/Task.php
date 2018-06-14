<?php
/**
 * Created by PhpStorm.
 * User: RenRen
 * Date: 2018/6/14
 * Time: 13:43
 */

namespace App\Process;
use EasySwoole\Core\Swoole\Task\AbstractAsyncTask;

class Task extends AbstractAsyncTask
{

    /**
     * 执行任务的内容
     * @param mixed $taskData     任务数据
     * @param int   $taskId       执行任务的task编号
     * @param int   $fromWorkerId 派发任务的worker进程号
     * @author : evalor <master@evalor.cn>
     */
    function run($taskData, $taskId, $fromWorkerId)
    {
        var_dump(123);
        // 需要注意的是task编号并不是绝对唯一
        // 每个worker进程的编号都是从0开始
        // 所以 $fromWorkerId + $taskId 才是绝度唯一的编号
        // !!! 任务完成需要 return 结果
    }

    /**
     * 任务执行完的回调
     * @param mixed $result  任务执行完成返回的结果
     * @param int   $task_id 执行任务的task编号
     * @author : evalor <master@evalor.cn>
     */
    function finish($result, $task_id)
    {
        // 任务执行完的处理
    }
}
<?php
namespace App\Process;
use EasySwoole\Core\Swoole\Process\AbstractProcess;
use Swoole\Process;
class Test extends AbstractProcess
{
    //进程start的时候会执行的事件
    public function run(Process $process)
    {
        // TODO: Implement run() method.
        //添加进程内定时器
        $this->addTick(2000,function (){
            var_dump('this is '.$this->getProcessName().' process tick');
        });
    }
    //当进程关闭的时候会执行该事件
    public function onShutDown()
    {
        // TODO: Implement onShutDown() method.
    }
    //当有信息发给该进程的时候，会执行此进程
    public function onReceive(string $str, ...$args)
    {
        // TODO: Implement onReceive() method.
        var_dump('process rec'.$str);
    }
}
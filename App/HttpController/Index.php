<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;
use App\Server\Redis;
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
        $this->response()->write('hello world!');
        $this->response()->write('<div style="text-align: center;margin-top: 30px"><h2>欢迎使用EASYSWOOLE</h2></div></br>');
        $this->response()->write('<div style="text-align: center">您现在看到的页面是默认的 Index 控制器的输出</div></br>');
        $this->response()->write('<div style="text-align: center"><a href="https://www.easyswoole.com/Manual/2.x/Cn/_book/Base/http_controller.html">查看手册了解详细使用方法</a></div></br>');
    }

    function redis()
    {
        $connect = new Redis();
        $redis = $connect->getConnect();
        for($i=0;$i<=50;$i++){
            try{
                $redis->rPush('click',$i);//队列
            }catch(\Exception $e){
                var_dump($e);
            }
        }
        var_dump($redis->lrange('click',0,50));//打印刚存进redis的队列
    }

    function pop()
    {
        try{
            $connect = new Redis();
            $redis = $connect->getConnect();
            $value = $redis->lpop('click');
            var_dump($value);
        }catch(\Exception $e){
            var_dump($e);
        }
    }

}
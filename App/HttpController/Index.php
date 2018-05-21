<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;
use think\Db;
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
        $page = Db::name('easyswoole')->paginate(20,true);
        $this->response()->write(json_encode($page));
    }
}
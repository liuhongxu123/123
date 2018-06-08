<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Component\Pool\PoolManager;
use App\Utility\MysqlPool;
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
        $pool = PoolManager::getInstance()->getPool(MysqlPool::class); // 获取连接池对象
        $db = $pool->getObj();
        $count = $db->rawQuery('select count(*) from easyswoole');
        $pool->freeObj($db);
        print_r($count);
    }
}
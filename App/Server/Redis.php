<?php
/**
 * Created by PhpStorm.
 * User: RenRen
 * Date: 2018/6/12
 * Time: 10:02
 */
namespace App\Server;

use \EasySwoole\Config;

class Redis
{
    private static $instance;
    private $con;

    static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Redis();
        }
        return self::$instance;
    }

    function __construct()
    {
        $conf = Config::getInstance()->getConf("REDIS");
        $this->con = new \Redis();
        $this->con->connect($conf['host'],$conf['port']);
        $this->con->auth($conf['auth']);
        $this->con->setOption(\Redis::OPT_SERIALIZER,\Redis::SERIALIZER_PHP);
    }

    function getConnect(){
        return $this->con;
    }
}
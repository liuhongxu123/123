<?php
namespace App\HttpController\Router;

use EasySwoole\Core\Http\AbstractInterface\Controller;

class Test extends Controller
{

    function index(){
        $this->response()->write('hello');
    }

    function test(){
        $this->response()->write('hello');
    }
}
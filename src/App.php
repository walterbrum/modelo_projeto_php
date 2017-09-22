<?php
namespace Vendor;

use Vendor\Util\Router;
use Vendor\Util\Sessao;

/**
 * 
 */
class App
{
    public function start()
    {
        $this->rotear();

    }

    private function rotear()
    {
        $router = new Router();

        $router->add('GET', '/', function () {
            $home = new Controller\Home();
            $home->exibir();
        });

        $router->add('GET', '/teste/(\d+)', function ($x) {
            echo 'dentro do "teste" - '.$x;
        });

        $router->executar();
    }
}

<?php
namespace Vendor\Controller;

use Vendor\Util\Logger\Logger;

/**
* Classe Home
*/
class Home extends Controller
{
	private $log;

	public function __construct()
	{
        $this->log = new Logger('Home');
	}

	public function exibir()
	{
		$ctx['titulo'] = 'Home';
		$this->view('home', $ctx);

		$this->log->debug('Dentro do Home');
	}
}
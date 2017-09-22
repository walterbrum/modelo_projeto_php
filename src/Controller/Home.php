<?php
namespace Vendor\Controller;

/**
* Classe Home
*/
class Home
{
	public function exibir()
	{
		$titulo = 'Home';
		$conteudo = 'Você está na Home';
		include '../src/view/layout.php';
	}
}
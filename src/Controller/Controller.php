<?php
namespace Vendor\Controller;


/**
* Classe Controller
*/
abstract class Controller
{
	/**
	 * Responsável por redenrizar o template
	 * 
	 * @param  String $path Path da view a ser mostrada
	 * @param  array  $args Array de variáveis para a view
	 */
	protected function view($path, array $args)
	{
		// extrai as variáveis do array para o scopo local
		extract($args);

		// ativa o buffer de saída
		ob_start();

		// insere a view
		require '../resources/views/'.$path.'.php';

		// Obtém o conteudo do buffer e exclui o buffer de saída atual
		// essa variável $conteúdo será utilizada na view do layout
		$conteudo = ob_get_clean();

		// isere a view do layout
		require '../resources/views/template/layout.php';
	}
}
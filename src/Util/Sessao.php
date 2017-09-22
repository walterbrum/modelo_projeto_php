<?php
namespace Vendor\Util;


class Sessao
{
	/**
	 * Inicia a sessão
	 */
	public static function iniciar()
	{
		// define uma identificação para sessão
		session_name('SSID');
		//inicia sessão
		session_start();
	}


	/**
	 * Apaga a sessão
	 *
	 * apaga os dados e deleta o cookie
	 */
	public static function destruir()
	{
		// http://php.net/manual/pt_BR/function.session-destroy.php
		// Unset all of the session variables.
		$_SESSION = array();
		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (isset($_COOKIE[session_name()])) {
		    setcookie(session_name(), '', time()-42000, '/');
		}
		// Finally, destroy the session.
		session_destroy();
	}
}

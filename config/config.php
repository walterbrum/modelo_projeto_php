<?php

/**
 * Define a variável global $config contendo um array com as configurações.
 */
$config = array(
	"db" => array(
            "dbname" => "database",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost"
        ),
	'version' => '0.1.0'
);


/**
 * Define o diretório ROOT do projeto.
 * Espera-se que o acesso ao script seja feito na pasta /root/public/
 */
defined("ROOT_DIR") or define("ROOT_DIR", realpath(dirname(__FILE__) . '/..'));


/**
 * Ativar o modo debug (somente em desenvolvimento)
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

<?php
/**
 * Este script em substituição do .htaccess do Apache
 * quando utilizado o servidor web interno no php.
 *
 * ex:
 * 
 * php -S localhost:8000 route_cli_server
 */


// Faz o roteamento verificando se é utilizado o servidor web interno do php.
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    // exibe o arquivo requisitado
    return false;
}
else
{
    // exibe sempre a index.php
    include __DIR__ . '/index.php';
}
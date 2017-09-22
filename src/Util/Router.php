<?php
namespace Vendor\Util;

/**
 * Classe Router
 */
class Router
{
    /**
     * @var array Os padrões de rota e seus manipuladores
     */
    private $routes;


    /**
     * Define o URI da requisição atual
     * 
     * @return string
     */
    private function getCurrentUri()
    {
        // obtém a Request URI
        $uri = $_SERVER['REQUEST_URI'];
        // remover os parametros da query string deixando somente a URL
        if (strstr($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        // remove a barra no fim e força uma bara no início.
        return '/' . trim($uri, '/');
    }


    /**
     * Armazena rota, sua função manipuladora e o método de acesso
     * 
     * @param string $method   O Método de acesso. Ex: GET POST
     * @param string $pattern  O pattern da rota. Ex: /usuarios/ativos
     * @param object|callable $callback A função manipuladora que será executada
     */
    public function add($method, $pattern, $callback) {
        // certifica-se que existe uma barra no inicio e nenhuma no fim.
        $pattern =  '/'.trim($pattern, '/');
        // armazena a rota.
        $this->routes[$method][$pattern] = $callback;
    }


    /**
     * Manipula um conjunto de rotas: Se for encontrada uma correspondência,
     * executa a função manipuladora relativa.
     * 
     * @param  array $routes Coleção de patterns de rota e suas funções manipuladoras
     * @return bool         Se foi encontrada uma correspondência
     */
    private function handle($routes)
    {
        // o URL atual
        $uri = $this->getCurrentUri();
        
        // loop em todas as rotas
        foreach ($routes as $pattern => $callback) {
            // rota encontrada!
            if (preg_match('#^'.$pattern.'$#', $uri, $params) === 1) {
                // o primeiro elemento é a string original e deve ser removido
                $params = array_slice($params, 1);
                // chama a função de manipulação da rota
                $callback(...$params);
                // informa que a rota foi encontrada
                return true;
            }
        }
        // nenhuma rota encontrada
        return false;
    }

    
    /**
     * Executa o roteador
     * 
     * Faz o loop nas rotas e executa a função manipuladora se
     * uma correspondência for encontrada
     * 
     * @return bool
     */
    public function executar()
    {
    	$match = false;
    	if (isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            $match = $this->handle($this->routes[$_SERVER['REQUEST_METHOD']]);
        }

        // nenhuma rota tratada
    	if (!$match) {
            include '../src/view/erro/404_not_found.php';
            return false;
    	}

        // rota tradada, retorna true
    	return true;
    }
}
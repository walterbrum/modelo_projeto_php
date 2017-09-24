<?php
namespace Vendor\Util\Logger;


class Logger implements LoggerInterface
{
	/**
     * @var string Nome que será exibido no log
     */
    private $name;

    /**
     * @var string Nome do arquivo
     */
    private $filename;

    /**
     * @var resource|null
     */
    private $stream;


    /**
     * Construtor
     * 
     * @param string $name     Nome do Log
     * @param string $filename Nome do arquivo (opcional)
     */
    public function __construct(string $name, string $filename = 'log')
    {
    	$this->name = $name;
        $this->filename = $filename;
    }


	/**
     * System is unusable.
     *
     * @param string $message
     * @param array  $context
     */
    public function emergency($message, array $context = array())
    {
    	$this->log('EMERGENCY', $message, $context);
    }


    /**
     * Action must be taken immediately.
     *
     * @param string $message
     * @param array  $context
     */
    public function alert($message, array $context = array())
    {
    	$this->log('ALERT', $message, $context);
    }


    /**
     * Critical conditions.
     * 
     * @param string $message
     * @param array  $context
     */
    public function critical($message, array $context = array())
    {
    	$this->log('CRITICAL', $message, $context);
    }


    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array  $context
     */
    public function error($message, array $context = array())
    {
    	$this->log('ERROR', $message, $context);
    }


    /**
     * Exceptional occurrences that are not errors.
     * 
     * @param string $message
     * @param array  $context
     */
    public function warning($message, array $context = array())
    {
    	$this->log('WARNING', $message, $context);
    }


    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array  $context
     */
    public function notice($message, array $context = array())
    {
    	$this->log('NOTICE', $message, $context);
    }


    /**
     * Interesting events.
     *
     * @param string $message
     * @param array  $context
     */
    public function info($message, array $context = array())
    {
    	$this->log('INFO', $message, $context);
    }


    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array  $context
     */
    public function debug($message, array $context = array())
    {
    	$this->log('DEBUG', $message, $context);
    }


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = array())
    {
        // verifica se o arquivo já está aberto
        if (!is_resource($this->stream)) {
            // configura o caminho e extenção do log
            $this->filename = '../log/'.$this->filename.'.log';
            // abre o stream
            $this->stream = fopen($this->filename, 'a');
        }

        // formata a mensagem
        $msg = '['.date("Y-m-d H:i:s").'] '.$this->name.'.'.$level.' '.$message."\n";
        
        // escreve no arquivo
        fwrite($this->stream, $msg);
    }


    /**
     * Fecha o arquivo
     */
    public function close()
    {
        if (is_resource($this->stream)) {
            fclose($this->stream);
            $this->stream = null;
        }
    }
}

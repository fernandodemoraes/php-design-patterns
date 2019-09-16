<?php

namespace DesignPatterns\Singleton;

/**
 * Class LogsSingleton
 * @package DesignPatterns\Singleton
 */
class LogsSingleton
{
    /**
     * @var LogsSingleton
     */
    protected static $instancia;

    /**
     * LogsSingleton constructor.
     */
    private function __construct() {}

    /**
     * @return void
     */
    private function __clone() {}

    /**
     * @return void
     */
    private function __wakeup() {}

    /**
     * @param array $dados
     */
    public function gravarLog(array $dados)
    {
        $nomeArquivo = 'logs.txt';
        $logsAnteriores = [];

        if (filesize($nomeArquivo) > 0) {
            $conteudoDoArquivo = file_get_contents($nomeArquivo);
            $logsAnteriores    = json_decode($conteudoDoArquivo, true);
        }

        $logsAnteriores[] = $dados;
        $arquivo          = fopen($nomeArquivo, 'w');

        fwrite($arquivo, json_encode($logsAnteriores));
        fclose($arquivo);
    }

    /**
     * @return LogsSingleton
     */
    public static function obterInstancia(): self
    {
        if (empty(self::$instancia)) {
            self::$instancia = new self();
        }

        return self::$instancia;
    }
}
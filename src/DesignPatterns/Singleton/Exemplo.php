<?php

namespace DesignPatterns\Singleton;

/**
 * Class Exemplo
 * @package DesignPatterns\Singleton
 */
class Exemplo
{
    /**
     * teste
     */
    public function teste()
    {
        $instancia = LogsSingleton::obterInstancia();
        $instancia->gravarLog([
            'nome'  => 'nome',
            'login' => 'login',
            'ip'    => 'ip'
        ]);

        $novaInstancia = LogsSingleton::obterInstancia();
        $instancia->gravarLog([
            'nome'  => 'anoter_nome',
            'login' => 'anoter_login',
            'ip'    => 'anoter_ip'
        ]);

        if ($instancia === $novaInstancia) {
            echo 'As instâncias são exatamente as mesmas!';
        }
    }
}
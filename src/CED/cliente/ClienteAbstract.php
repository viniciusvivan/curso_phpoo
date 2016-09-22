<?php

namespace CED\cliente;

use \CED\cliente\interfaces\clienteInterface;
use \CED\cliente\interfaces\NivelImpInterface;

abstract class ClienteAbstract implements clienteInterface, NivelImpInterface
{
    protected $nome;
    protected $telefone;
    protected $endereco;
    protected $nivelImp;

    public function __construct($nome, $telefone, $endereco)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getNivelImp()
    {
        return $this->nivelImp;
    }

    public function setNivelImp($nivelImp)
    {
        $this->nivelImp = $nivelImp;
    }

}
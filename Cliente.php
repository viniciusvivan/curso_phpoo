<?php
include_once("clienteInterface.php");

class Cliente implements clienteInterface
{

    public $nome;
    public $cpf;
    public $telefone;
    public $endereco;

    public function __construct($nome, $cpf, $telefone, $endereco)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    public function getNome()
    {
        return $this->nome;
    }


    public function getCpf()
    {
        return $this->cpf;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }


    public function getEndereco()
    {
        return $this->endereco;
    }

}
<?php
namespace CED\cliente\types;

use \CED\cliente\ClienteAbstract;
use \CED\cliente\interfaces\clienteJuridicoInterface;
use \CED\cliente\interfaces\EndCobrancaInterface;

class ClienteJuridico extends ClienteAbstract implements clienteJuridicoInterface, EndCobrancaInterface
{
    private $cnpj;
    private $endCobranca;

    public function __construct($nome, $cpf, $telefone, $endereco)
    {
        parent::__construct($nome, $telefone, $endereco);
        $this->cpf = $cpf;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getEndCobranca()
    {
        return $this->endCobranca;
    }

    public function setEndCobranca($endCobranca)
    {
        $this->endCobranca = $endCobranca;
    }

}
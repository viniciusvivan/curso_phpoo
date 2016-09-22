<?php
namespace CED\Cliente\Types;

use \CED\Cliente\ClienteAbstract;
use \CED\Cliente\Interfaces\clienteJuridicoInterface;
use \CED\Cliente\Interfaces\EndCobrancaInterface;

class ClienteJuridico extends ClienteAbstract implements clienteJuridicoInterface, EndCobrancaInterface
{
    private $cnpj;
    private $endCobranca;

    public function __construct($nome, $cnpj, $telefone, $endereco)
    {
        parent::__construct($nome, $telefone, $endereco);
        $this->cnpj = $cnpj;
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
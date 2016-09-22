<?php
namespace CED\Cliente\Types;

use \CED\Cliente\ClienteAbstract;
use \CED\Cliente\Interfaces\clienteFisicoInterface;
use \CED\Cliente\Interfaces\EndCobrancaInterface;

class ClienteFisico extends ClienteAbstract implements clienteFisicoInterface, EndCobrancaInterface
{
    private $cpf;
    private $endCobranca;

    public function __construct($nome, $cpf, $telefone, $endereco)
    {
        parent::__construct($nome, $telefone, $endereco);
        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
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
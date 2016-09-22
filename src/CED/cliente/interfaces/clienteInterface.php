<?php

namespace CED\Cliente\Interfaces;

interface clienteInterface
{
    public function getNome();
    public function setNome($nome);
    public function getTelefone();
    public function setTelefone($telefone);
    public function getEndereco();
    public function setEndereco($endereco);
}
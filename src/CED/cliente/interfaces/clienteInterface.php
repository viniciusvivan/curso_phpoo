<?php

namespace CED\cliente\interfaces;

interface clienteInterface
{
    public function getNome();
    public function setNome($nome);
    public function getTelefone();
    public function setTelefone($telefone);
    public function getEndereco();
    public function setEndereco($endereco);
}
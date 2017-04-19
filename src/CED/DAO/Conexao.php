<?php

namespace CED\DAO;

use \CED\Cliente\Types\ClienteFisico;
use \CED\Cliente\Types\ClienteJuridico;

class Conexao
{
    var $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=curso_phpoo', 'root', 'senha123');
    }


    /**
     * @param ClienteFisico $clienteFisico
     * @return bool
     */
    public function persistFisico(ClienteFisico $clienteFisico)
    {
        $nome = $clienteFisico->getNome();
        $cpf = $clienteFisico->getCpf();
        $fone = $clienteFisico->getTelefone();
        $endereco = $clienteFisico->getEndereco();
        $enderecoCobranca = $clienteFisico->getEndCobranca();
        $nivelImportancia = $clienteFisico->getNivelImp();

        $sql = "INSERT INTO `curso_phpoo`.`cliente` 
                (`nome`, `cpf_cnpj`, `fone`, `endereco`, `endereco_cobranca`, `nivel_importancia`, tipo) 
                VALUES ('$nome', '$cpf', '$fone', '$endereco', '$enderecoCobranca', '$nivelImportancia', 'Físico');";

        $stmt = $this->pdo->prepare($sql);
        $run = $stmt->execute();
        if($run) return true;
        return false;
    }

    /**
     * @param ClienteJuridico $clienteJuridico
     * @return bool
     */
    public function persistJuridico(ClienteJuridico $clienteJuridico)
    {
        $nome = $clienteJuridico->getNome();
        $cpf = $clienteJuridico->getCnpj();
        $fone = $clienteJuridico->getTelefone();
        $endereco = $clienteJuridico->getEndereco();
        $enderecoCobranca = $clienteJuridico->getEndCobranca();
        $nivelImportancia = $clienteJuridico->getNivelImp();

        $sql = "INSERT INTO `curso_phpoo`.`cliente` 
                (`nome`, `cpf_cnpj`, `fone`, `endereco`, `endereco_cobranca`, `nivel_importancia`, tipo) 
                VALUES ('$nome', '$cpf', '$fone', '$endereco', '$enderecoCobranca', '$nivelImportancia', 'Jurídico');";

        $stmt = $this->pdo->prepare($sql);
        $run = $stmt->execute();
        if($run) return true;
        return false;
    }


    /**
     * Retorna os dados necessários para iniciar a Sessão
     *
     * @param $cd_usuario
     * @return array|bool
     */
    public function retorna_clientes($cd_usuario)
    {
        $sql = "SELECT cd_usuario, cd_grupo, sg_cpf, nm_usuario, de_email,
                razao_social as nm_clube, de_senha, cda_tb_usuario.cd_clube, de_status, nm_imagem 
                FROM cda_tb_usuario
                LEFT JOIN bas_tb_clube ON cda_tb_usuario.cd_clube = bas_tb_clube.cd_clube
                WHERE cd_usuario = '$cd_usuario'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cd_usuario', $cd_usuario);
        $run = $stmt->execute();
        if($run) return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return false;
    }

    /**
     * @return mixed
     */
    public function getAllClients()
    {
        $sql = "SELECT * FROM curso_phpoo.cliente";
        $stmt = $this->pdo->prepare($sql);
        $run = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function getOneClient($idCliente)
    {
        $sql = "SELECT * FROM curso_phpoo.cliente WHERE idCliente = $idCliente";
        $stmt = $this->pdo->prepare($sql);
        $run = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
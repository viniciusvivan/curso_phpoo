<?php

include_once("Cliente.php");

$clientes = array(
    'nome' => array(),
    'cpf' => array(),
    'telefone' => array(),
    'endereco' => array()
);

$clientes[0] = new Cliente("José De Alencar", "045.558.485-36", "(44) 8574-5214", "Rua Fulano de tal");
$clientes[1] = new Cliente("Maria Isabel", "524.785.878-78", "(43) 9958-5421", "Rua sicrano de tal");
$clientes[2] = new Cliente("Luiz Felipe", "456.789.213-45", "(11) 5522-2457", "Rua tavares");
$clientes[3] = new Cliente("Aparecida Ramos", "741.854.524-12", "(82) 7777-2420", "Rua de pedra");
$clientes[4] = new Cliente("Jorge Luiz", "789.153.257-45", "(45) 8574-5888", "Rua das flores");
$clientes[5] = new Cliente("Antonio da Silva", "257.257.456-84", "(78) 4568-7887", "Rua sigilo");
$clientes[6] = new Cliente("Bartolomeu Ruiz", "045.257.878-00", "(44) 2125-2254", "Rua do vale");
$clientes[7] = new Cliente("Alexander Tomé", "045.456.457-45", "(11) 9987-7882", "Rua logo ali");
$clientes[8] = new Cliente("Lurdes Ferreira", "057.458.478-36", "(11) 9985-4587", "Rua de baixo");
$clientes[9] = new Cliente("Pablo Grudin", "147.789.123-57", "(43) 7855-3578", "Rua Maoeee");

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <title>Projeto POO</title>
    <meta charset="utf-8">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <section>
        <header class="jumbotron">
            <div class="container">
                <h1>Lista de clientes</h1>
            </div>
        </header>
        <article class="container">
            <table border="1" class="table table-striped">
                <thead>
                    <tr>
                        <?php
                            if(isset($_GET['ord']) && $_GET['ord'] == "des"){
                                echo "<th><a href='index.php?ord=asc'>ID ></a></th>";
                            }else{
                                echo "<th><a href='index.php?ord=des'>ID <</a></th>";
                            }
                        ?>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Endreço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_GET['ord']) && $_GET['ord'] == "des"){
                            for ($k = 9; $k >= 0; $k--) {
                                $id = $k;
                                $nome = $clientes[$k]->getNome();
                                $cpf = $clientes[$k]->getCpf();
                                $telefone = $clientes[$k]->getTelefone();
                                $endereco = $clientes[$k]->getEndereco();
                                echo "
                                <tr>
                                    <th>$k</th>
                                    <th>$nome</th>
                                    <th>$cpf</th>
                                    <th>$telefone</th>
                                    <th>$endereco</th>
                                </tr>
                            ";
                            }
                        }else{
                            for ($k=0; $k < 10; $k++) {
                                $id = $k;
                                $nome = $clientes[$k]->getNome();
                                $cpf = $clientes[$k]->getCpf();
                                $telefone = $clientes[$k]->getTelefone();
                                $endereco = $clientes[$k]->getEndereco();
                                echo "
                                <tr>
                                    <th>$k</th>
                                    <th>$nome</th>
                                    <th>$cpf</th>
                                    <th>$telefone</th>
                                    <th>$endereco</th>
                                </tr>
                            ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </article>
        <footer class="panel panel-footer">
            <div class="container">
                <p>Aluno: Vinicius Vivan</p>
            </div>
        </footer>
    </section>
</body>
</html>

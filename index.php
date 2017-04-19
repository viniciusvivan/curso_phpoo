<?php
define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

use CED\Cliente\Types\ClienteFisico;
use CED\Cliente\Types\ClienteJuridico;
use CED\DAO\Conexao;

$cliente_1 = new ClienteFisico("José De Alencar", "045.558.485-36", "(44) 8574-5214", "Rua Fulano de tal");
$cliente_2 = new ClienteFisico("Maria Isabel", "524.785.878-78", "(43) 9958-5421", "Rua sicrano de tal");
$cliente_3 = new ClienteFisico("Luiz Felipe", "456.789.213-45", "(11) 5522-2457", "Rua tavares");
$cliente_4 = new ClienteJuridico("Syma Informática", "98.918.396/0001-55", "(82) 7777-2420", "Rua de pedra");
$cliente_5 = new ClienteFisico("Jorge Luiz", "789.153.257-45", "(45) 8574-5888", "Rua das flores");
$cliente_6 = new ClienteJuridico("Aldo Componentes", "82.583.904/0001-51", "(78) 4568-7887", "Rua sigilo");
$cliente_7 = new ClienteJuridico("Supermercado Cidade Canção", "48.191.461/0001-15", "(44) 2125-2254", "Rua do vale");
$cliente_8 = new ClienteFisico("Alexander Tomé", "045.456.457-45", "(11) 9987-7882", "Rua logo ali");
$cliente_9 = new ClienteFisico("Lurdes Ferreira", "057.458.478-36", "(11) 9985-4587", "Rua de baixo");
$cliente_10 = new ClienteJuridico("Frango Frito", "69.301.027/0001-10", "(43) 7855-3578", "Rua Maoeee");

$cliente_4->setEndCobranca("Rua Dos lirios, 592, Maringá/PR");
$cliente_5->setEndCobranca("Rua Francisco Chaves, 204, Maringá/PR");

$cliente_1->setNivelImp('5 *****');
$cliente_2->setNivelImp('1 *');
$cliente_3->setNivelImp('2 **');
$cliente_4->setNivelImp('5 *****');
$cliente_5->setNivelImp('4 ****');
$cliente_6->setNivelImp('3 ***');
$cliente_7->setNivelImp('1 *');
$cliente_8->setNivelImp('2 **');
$cliente_9->setNivelImp('4 ****');
$cliente_10->setNivelImp('3 ***');

$conexao = new Conexao();
$conexao->persistFisico($cliente_1);
$conexao->persistFisico($cliente_2);
$conexao->persistFisico($cliente_3);
$conexao->persistJuridico($cliente_4);
$conexao->persistFisico($cliente_5);
$conexao->persistJuridico($cliente_6);
$conexao->persistJuridico($cliente_7);
$conexao->persistFisico($cliente_8);
$conexao->persistFisico($cliente_9);
$conexao->persistJuridico($cliente_10);
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
                    <th>Tipo de Cliente</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $clientes = $conexao->getAllClients();
                if(isset($_GET['ord']) && $_GET['ord'] == "des"){
                    for ($k = count($clientes); $k >= 0; $k--) {
                        $link = "detalhes.php?id=".$clientes[$k]['id_cliente'];
                        echo "
                                <tr>
                                    <th>$clientes[$k][id_cliente]</th>
                                    <th><a href='$link'.$link>$clientes[$k][nome]</a></th>
                                    <th>$clientes[$k][tipo]</th>
                                </tr>
                            ";
                    }
                }else{
                    for ($k = count($clientes); $k >= 0; $k--) {
                        $link = "detalhes.php?id=".$clientes[$k]['id_cliente'];
                        echo "
                                <tr>
                                    <th>$clientes[$k][id_cliente]</th>
                                    <th><a href='$link'.$link>$clientes[$k][nome]</a></th>
                                    <th>$clientes[$k][tipo]</th>
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

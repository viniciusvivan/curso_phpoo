<?php
define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

use CED\Cliente\Types\ClienteFisico;
use CED\Cliente\Types\ClienteJuridico;

$clientes = array(
    'nome' => array(),
    'cpf' => array(),
    'telefone' => array(),
    'endereco' => array()
);

$clientes[0] = new ClienteFisico("José De Alencar", "045.558.485-36", "(44) 8574-5214", "Rua Fulano de tal");
$clientes[1] = new ClienteFisico("Maria Isabel", "524.785.878-78", "(43) 9958-5421", "Rua sicrano de tal");
$clientes[2] = new ClienteFisico("Luiz Felipe", "456.789.213-45", "(11) 5522-2457", "Rua tavares");
$clientes[3] = new ClienteJuridico("Syma Informática", "98.918.396/0001-55", "(82) 7777-2420", "Rua de pedra");
$clientes[4] = new ClienteFisico("Jorge Luiz", "789.153.257-45", "(45) 8574-5888", "Rua das flores");
$clientes[5] = new ClienteJuridico("Aldo Componentes", "82.583.904/0001-51", "(78) 4568-7887", "Rua sigilo");
$clientes[6] = new ClienteJuridico("Supermercado Cidade Canção", "48.191.461/0001-15", "(44) 2125-2254", "Rua do vale");
$clientes[7] = new ClienteFisico("Alexander Tomé", "045.456.457-45", "(11) 9987-7882", "Rua logo ali");
$clientes[8] = new ClienteFisico("Lurdes Ferreira", "057.458.478-36", "(11) 9985-4587", "Rua de baixo");
$clientes[9] = new ClienteJuridico("Frango Frito", "69.301.027/0001-10", "(43) 7855-3578", "Rua Maoeee");


$clientes[4]->setEndCobranca("Rua Dos lirios, 592, Maringá/PR");
$clientes[7]->setEndCobranca("Rua Francisco Chaves, 204, Maringá/PR");


$clientes[0]->setNivelImp('5 *****');
$clientes[1]->setNivelImp('1 *');
$clientes[2]->setNivelImp('2 **');
$clientes[3]->setNivelImp('5 *****');
$clientes[4]->setNivelImp('4 ****');
$clientes[5]->setNivelImp('3 ***');
$clientes[6]->setNivelImp('1 *');
$clientes[7]->setNivelImp('2 **');
$clientes[8]->setNivelImp('4 ****');
$clientes[9]->setNivelImp('3 ***');
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
                if(isset($_GET['ord']) && $_GET['ord'] == "des"){
                    for ($k = 9; $k >= 0; $k--) {
                        $tipo = get_class($clientes[$k]);
                        $id = $k;
                        $nome = $clientes[$k]->getNome();
                        $cobranca = $clientes[$k]->getEndCobranca();
                        $importancia = $clientes[$k]->getNivelImp();
                        if($tipo == ClienteFisico::class){
                            $cadastro = $clientes[$k]->getCpf();
                            $tipo = "Pessoa Fisica";
                        }
                        else{
                            $cadastro = $clientes[$k]->getCnpj();
                            $tipo = "Pessoa Juridica";
                        }
                        $telefone = $clientes[$k]->getTelefone();
                        $endereco = $clientes[$k]->getEndereco();
                        $link = "detalhes.php?id=$k&nome=$nome&cadastro=$cadastro&tel=$telefone&end=$endereco
                                 &cob=$cobranca&imp=$importancia";
                        echo "
                                <tr>
                                    <th>$k</th>
                                    <th><a href='$link'.$link>$nome</a></th>
                                    <th>$tipo</th>
                                </tr>
                            ";
                    }
                }else{
                    for ($k=0; $k < 10; $k++) {
                        $tipo = get_class($clientes[$k]);
                        $id = $k;
                        $nome = $clientes[$k]->getNome();
                        $cobranca = $clientes[$k]->getEndCobranca();
                        $importancia = $clientes[$k]->getNivelImp();
                        if ($tipo == ClienteFisico::class) {
                            $cadastro = $clientes[$k]->getCpf();
                            $tipo = "Pessoa Fisica";
                        } else {
                            $cadastro = $clientes[$k]->getCnpj();
                            $tipo = "Pessoa Juridica";
                        }
                        $telefone = $clientes[$k]->getTelefone();
                        $endereco = $clientes[$k]->getEndereco();
                        $link = "detalhes.php?id=$k&nome=$nome&cadastro=$cadastro&tel=$telefone&end=$endereco
                                 &cob=$cobranca&imp=$importancia";
                        echo "
                                <tr>
                                    <th>$k</th>
                                    <th><a href='$link'.$link>$nome</a></th>
                                    <th>$tipo</th>
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

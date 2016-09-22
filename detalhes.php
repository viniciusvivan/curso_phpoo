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
            <h1>Dados do cliente</h1>
        </div>
    </header>
    <article>
        <div class="container">
            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Endereço De Cobrança</th>
                    <th>Nível de Importância</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $id = $_GET['id'];
                    $nome = $_GET['nome'];
                    $cadastro = $_GET['cadastro'];
                    $telefone = $_GET['tel'];
                    $endereco = $_GET['end'];
                    $cobranca = $_GET['cob'];
                    $importancia = $_GET['imp'];
                    echo "
                    <tr>
                        <th>$id</th>
                        <th>$nome</th>
                        <th>$cadastro</th>
                        <th>$telefone</th>
                        <th>$endereco</th>
                        <th>$cobranca</th>
                        <th>$importancia</th>
                    </tr>
                    ";
                ?>
                </tbody>
            </table>
            <a href="index.php"><button name="voltar" class="btn btn-success">Voltar</button></a>
        </div>
    </article>
    <footer class="panel panel-footer">
        <div class="container">
            <p>Aluno: Vinicius Vivan</p>
        </div>
    </footer>
</section>
</body>
</html>

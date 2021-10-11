<!-- recebendo os dados do BD com PHP -->
<?php

# incluindo a conexao
require './conexao.php';
require 'links.php';
# criando array
$lista = [];

#PEGANDO OS DADOS COM BUSCA
$sql= $conexao->query("SELECT * FROM agendas");

#verificando SE existe algum usuario exibir
if($sql->rowCount() > 0){
    #PEGANDO INTENS E ADD NA LISTA
    //cria um array joga os dados dentro de lista
    $lista = $sql->fetchALL(PDO::FETCH_ASSOC);
    //apos crio um loop para receber dados na tabela
}
?>


<!-- CSS bootstrap -->
<link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css">
<!-- css -->
<link rel="stylesheet" href="/styles/modal_corfimation.css">
<!-- font awesome icons -->
<script src="https://kit.fontawesome.com/0d36460cd3.js" crossorigin="anonymous"></script>
<body class="bg-dark">
    <div class="container-content" style="margin-top:40px;font-size:14px; width:100%; padding:10px;">

        <div class="title-table text-info">
            <h3>Lista de Contatos</h3>
            <a href="../../index.php" role="button" class="btn btn-secondary mb-2">Cadastrar Novo</a>
        </div>

        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <!-- Cabeçalho da Tabela-->
                    <th scope="col">ID</th>
                    <th scope="col">Sigla Sistema</th>
                    <th scope="col">Nome Sistema</th>
                    <th scope="col">Responsavel Sistema/Área</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <!-- 
            //essa forma de foreach com php me permit abrir e fechar o PHP aonde eu quiser

            # após verificar SE existe algum usuario exibir na tabela com foreach 
            -->
                <?php foreach($lista as $usuario): ?>
                    <tr>
                        <!-- recebendo imprimindo-->
                        <td><?=  $usuario['id'] ?></td>
                        <td><?=  $usuario['sigla_sistema'] ?></td>
                        <td><?=  $usuario['nome_sistema'] ?></td>
                        <td><?=  $usuario['responsavel_sistema'] ?></td>
                        <td><?=  $usuario['telefone'] ?></td>
                        <td><?=  $usuario['email'] ?></td>
                        <td>
                            <!-- Editar -->
                            <a class="btn btn-warning btn-sm" href="./editar_agenda.php?id=<?= $usuario['id']; ?>" role="button" style="color: white;"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                            <!-- Adeletar -->
                            <a class="btn btn-danger btn-sm" href="./delete.php?id=<?= $usuario['id']; ?>"  role="button" style="color: white;"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                            <!-- caso precise insira no botão DELETAR -->
                            <!-- onclick="return confirm('Tem certeza que deseja excluir?')" -->
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
</body>

</html>
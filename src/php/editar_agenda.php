<?php 
    require './conexao.php';
    require 'links.php';

    $info = []; //recebera inform. do usuario

    #PEGANDO ID
    $id = filter_input(INPUT_GET, 'id');

    #VERIFICANDO SE FOI ENVIADO ALGUM DADO
    if($id){ //se tiver dados

        #BUSQUE ID
        $sql= $conexao->prepare("SELECT * FROM agendas WHERE id = :id");
        // substituir os valore
        $sql->bindValue(':id', $id);
        $sql->execute();

        #VERIFICAR SE ACHOU ALGUMA COISA
        if($sql->rowCount() > 0){
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        }else{//se não achar dados
            header('location: listar_agenda.php');
        }

    }else{//se não tem dados
        header("location: listar_agenda.php");
        exit;
    }

?>

<body class="bg-dark">
    <div class="container" style="background-color:#3c3b3b; color:white; padding:5px 20px 20px 20px;margin-top:100px; width:700px; border-radius:10px;">
        <div class="title-form pt-4">
            <!-- <i class="far fa-id-card icon-agenda"></i> -->
            <h1>Editar Agenda De Sistemas</h1>
        </div>
        <form id="form" action="./update.php" method="POST">
            
                <div class="mb-3">
                    <label class="form-label">Sigla Sistema:</label>
                    <input type="text" class="form-control" name="sigla_sistema" value="<?=$info['sigla_sistema'] ?>">
                    <input type="hidden" class="form-control" name="id" value="<?=$info['id'] ?>">
                </div>
                <div class="mb-3">
                    <label>Nome do Sistema:</label>
                    <input type="text" class="form-control" name="nome_sistema" value="<?=$info['nome_sistema'] ?>">
                </div>
                <div class="mb-3">
                    <label>Responsável Sistema/Área:</label>
                    <input type="text" class="form-control" name="responsavel_sistema" value="<?=$info['responsavel_sistema'] ?>">
                </div>
                <div class="mb-3">
                    <label>Telefone:</label>
                    <input type="text" class="form-control" name="telefone" value="<?=$info['telefone'] ?>">
                </div>
                <div class="mb-3">
                    <label>E-mail:</label>
                    <input type="text" class="form-control" name="email" value="<?=$info['email'] ?>">
                </div>

                <button type="submit" class="btn btn-success" style="padding-right: 25px;padding-left: 25px;">
                    <i class="far fa-thumbs-up"></i>&nbsp;Editar
                </button>
                
                <a href="listar_agenda.php" style="margin-right: 5px;" class="btn btn-danger">
                <i class="fas fa-trash"></i>&nbsp;Cancelar
                </a>
        </form>

    </div>


    <!-- link bootstrap css -->
    <script src="/lib/bootstrap/js/bootstrap.js"></script>
</body>

</html>
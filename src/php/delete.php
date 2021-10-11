<?php
require './conexao.php';
require 'links.php';

#PEGANDO O ID
$id = filter_input(INPUT_GET, 'id');

#VERIFICANDO SE FOI ENVIADO ALGUM DADO
if($id){ //se tiver dados

    $sql = $conexao->prepare("DELETE FROM agendas WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo "
        <!-------------------- CRIANDO BOTÃO DE CONFIRMAÇÃO DELETAR ------------------------->
        <!-- CSS bootstrap -->
        <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>
        <!-- css -->
        <link rel='stylesheet' href='/styles/modal_corfimation.css'>
        
        <div class='container' style='margin-top:220px;'>
            <div class='modal-body'>
                <center>
                    <h4>Contato Deletado Sucesso!</h4>
                </center>
            </div>
            <div class='modal-body'>
                <center>
                    <a href='listar_agenda.php' role='button' class='btn btn-sm btn-success'>Voltar</a>
                </center>
            </div>
        </div>
    ";
    exit;
} else {
    // header("location: listar_agenda.php");
    echo "
        <!-------------------- CRIANDO BOTÃO DE ERRO AO DELETAR ------------------------->
        <!-- CSS bootstrap -->
        <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>
        <!-- css -->
        <link rel='stylesheet' href='/styles/modal_corfimation.css'>
        
        <div class='container' style='margin-top:220px;'>
            <h4>Erro! Contato não foi Deletado!</h4>
            <div class='modal-body'>
                <center>
                    <h4>Erro! Contato não foi Deletado!</h4>
                </center>
            </div>
            <div class='modal-body'>
                <center>
                    <a href='listar_agenda.php' role='button' class='btn btn-sm btn-danger'>Tentar novamente!</a>
                </center>
            </div>
        </div>
    ";
    exit;
}

?>
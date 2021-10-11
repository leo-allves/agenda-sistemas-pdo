<?php
require './conexao.php';
require 'links.php';

//UPDATE
$id = filter_input(INPUT_POST, 'id');
$sigla_sistema = filter_input(INPUT_POST, 'sigla_sistema');
$nome_sistema = filter_input(INPUT_POST, 'nome_sistema');
$responsavel_sistema = filter_input(INPUT_POST, 'responsavel_sistema');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


//VERIFICAÇÃO SE OS CAMPOS ESTIVER OK ATUALIZAR SE NÃO RETURN A listar_agenda.php
if($id && $sigla_sistema && $nome_sistema && $responsavel_sistema && $telefone && $email){
    #UPDATE
    //montando a QUERY
    $sql = $conexao->prepare("UPDATE agendas SET
    sigla_sistema = :sigla_sistema, nome_sistema = :nome_sistema,responsavel_sistema = :responsavel_sistema,
    telefone =:telefone, email = :email 
    WHERE id =  :id");
    
    #INSERINDO DADOS
    //bindValue associa 1ºparam c/ 2ºparam
    $sql->bindValue(':id', $id);
    $sql->bindValue(':sigla_sistema', $sigla_sistema);
    $sql->bindValue(':nome_sistema', $nome_sistema);
    $sql->bindValue(':responsavel_sistema', $responsavel_sistema);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':email', $email);

    #EXECUTANDO A QUERY
    $sql->execute();

    #APÓS RETORNAR listar_agenda.php 
    // header('location: listar_agenda.php');
    // exit;
    echo "
        <!-------------------- CRIANDO MODAL DE CONFIRMAÇÃO DE ATUALIAZAÇÃO ------------------------->
        <!-- CSS bootstrap -->

        <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>

        <!-- css -->

        <link rel='stylesheet' href='/styles/modal_corfimation.css'>

        <div style='margin-top: 15%;' class='container'>
            
            <div class='modal-body'>
                <center>
                    <h4>Contato Atualizado com Sucesso!</h4>
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
    
} else{
    echo "
        <!-------------------- CRIANDO MODAL DE CONFIRMAÇÃO DE ATUALIAZAÇÃO ------------------------->
        <!-- CSS bootstrap -->

        <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>

        <!-- css -->

        <link rel='stylesheet' href='/styles/modal_corfimation.css'>

        <div style='margin-top: 15%;' class='container'>
            <div class='modal-body'>
                <center>
                    <h4>Erro! Por favor preencha os campos corretamente</h4>
                </center>
            </div>
            <div class='modal-body'>
                <center>
                    <a href='/src/php/listar_agenda.php' role='button' class='btn btn-sm btn-danger'>Retornar</a>
                </center>
            </div>
        </div>

    ";
    exit;
}


?>
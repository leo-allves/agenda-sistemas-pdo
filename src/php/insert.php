<?php
require './conexao.php';

//INSERT
$sigla_sistema = filter_input(INPUT_POST, 'sigla_sistema');
$nome_sistema = filter_input(INPUT_POST, 'nome_sistema');
$responsavel_sistema = filter_input(INPUT_POST, 'responsavel_sistema');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//VERIFICAÇÃO SE OS CAMPOS ESTIVER OK INSERI SE NÃO RETURN A CADASTRO
if($sigla_sistema && $nome_sistema && $responsavel_sistema && $telefone && $email){
    # verificando se já existe e-mail igual ao inserido
    // se não inserir o novo usuario
    $sql = $conexao->prepare("SELECT * FROM agendas WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    #VERIFICANDO SE VIERAM ALGUM E_MAIL IGUAL da consulta anterior
    //$sql->rowCount() -quantos registros vieram dessa consulta
    if($sql->rowCount() == 0){//SE a quant. de registros for 0 execute o INSERT

        #ADD USUARIO
        //montando a QUERY
        $sql = $conexao->prepare("INSERT INTO agendas 
        (sigla_sistema, nome_sistema, responsavel_sistema, telefone, email) 
        VALUES 
        (:sigla_sistema, :nome_sistema, :responsavel_sistema, :telefone, :email)");
    
        #INSERINDO DADOS
        //bindValue associa 1ºparam c/ 2ºparam
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
            <!-------------------- CRIANDO BOTÃO DE CONFIRMAÇÃO DE CADASTRO ------------------------->
            <!-- CSS bootstrap -->

            <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>

            <!-- css -->

            <link rel='stylesheet' href='/styles/modal_corfimation.css'>

            <div style='margin-top: 15%;' class='container'> 
                <div class='modal-body'>
                    <center>
                        <h4>Contato Adicionado com Sucesso!</h4>
                    </center>
                    <center>
                        <a href='/src/php/listar_agenda.php' role='button' class='btn btn-sm btn-success'>Voltar</a>
                    </center>
                </div>
            </div>
        ";
        exit;


    } else{
        // header('location: /index.php');
        echo "
            <!-------------------- CRIANDO MODAL DE ERRO de cadastro ------------------------->
            <!-- CSS bootstrap -->

            <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>

            <!-- css -->

            <link rel='stylesheet' href='/styles/modal_corfimation.css'>

            <div style='margin-top: 15%;' class='container'>
                <h4>ERRO! Por favor verifique se os campos foram adicionados corretamente!</h4>
                <div class='modal-body'>
                    <center>
                        <a href='/src/php/listar_agenda.php' role='button' class='btn btn-sm btn-danger'>Cadastrar novamente</a>
                    </center>
                </div>
            </div>
        ";
        exit;
    }


} else{
    // header('location: /index.php');
    echo "
    <!-------------------- CRIANDO MODAL DE ERRO de cadastro ------------------------->
    <!-- CSS bootstrap -->

    <link rel='stylesheet' href='/lib/bootstrap/css/bootstrap.css'>

    <!-- css -->

    <link rel='stylesheet' href='/styles/modal_corfimation.css'>

    <div style='margin-top: 15%;' class='container'>
        <h4>ERRO! Por favor verifique se os campos foram adicionados corretamente!</h4>
        <div class='modal-body'>
            <center>
                <a href='/src/php/listar_agenda.php' role='button' class='btn btn-sm btn-danger'>Cadastrar novamente</a>
            </center>
        </div>
    </div>
    ";
    exit;
}

?>

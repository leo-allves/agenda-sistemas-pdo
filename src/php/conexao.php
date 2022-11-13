<?php

    $db_name = 'agenda-sistemas-pdo';
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';

    $conexao = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
?>
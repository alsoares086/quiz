<?php

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //$avatar = $_POST['avatar'];

    try{
        $conn = new PDO ("mysql:host=localhost;dbname=quiz", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha');";
        $conn->exec($sql);

        //$last_id = $conn->lastInsertId();
        echo "deu certo";
    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>
<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome      = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email     = $_POST['email'];
    $matricula = $_POST['matricula'];
    $senha     = trim($_POST['senha']);

    if ($connect) {
        $senha_md5 = md5($senha);

        $sql = "INSERT INTO usuarios (nome, sobrenome, email, matricula, senha) 
                VALUES ('$nome', '$sobrenome', '$email', '$matricula', '$senha_md5')";

        if (mysqli_query($connect, $sql)) {
            $_SESSION["msg_popup"] = "Cadastro realizado com sucesso!";
        } else {
            $_SESSION["msg_popup"] = "Falha no cadastro: " . mysqli_error($connect);
        }

        header('Location: index.php');
        exit();
    } else {
        $_SESSION["msg_popup"] = "Erro de conexão com o banco de dados!";
        header('Location: index.php');
        exit();
    }
}

<?php
require_once 'db_connect.php';
session_start();

if (isset($_POST['btn-entrar'])) {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $email = mysqli_escape_string($connect, $email);
    $senha = mysqli_escape_string($connect, $senha);
    $senha_md5 = md5($senha);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha_md5'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id'];
        header('Location: home.php');
        exit;
    } else {
        $_SESSION["msg_popup"] = "Usuário e senha não conferem.";
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Formulário de Login</title>
</head>

<body>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="msgToast" class="toast text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Erro</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body" id="msg-toast-body"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php include_once('msg_popup.php'); ?>

    <div class="container">
        <div class="form-image"></div>
        <div class="form">
            <form id="form" action="index.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Sistema de Agendamento de Atendimento com os Professores - S.I.A.A.P</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>
                <div class="entrar-button">
                    <button type="submit" name="btn-entrar">Entrar</button>
                </div>
            </form>
            <div class="cadastro-button">
                <button><a href="cadastro.html">Cadastrar-se</a></button>
            </div>
            <div class="cadastro-button">
                <button><a href="esqueceusenha.php">Esqueceu sua senha?</a></button>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="loginToast" class="toast text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Erro</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="login-toast-body"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
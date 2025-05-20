<?php
require_once 'db_connect.php';
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: index.php');
    exit;
}

$id = $_SESSION['id_usuario'];

$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $dados = mysqli_fetch_array($resultado);
} else {
    header('Location: index.php');
    exit;
}

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - S.I.A.A.P</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div class="d-flex">

        <div class="bg-dark text-white d-flex flex-column p-3" style="width: 220px; min-height: 100vh;">
            <h4 class="text-success fw-bold mb-4">S.I.A.A.P</h4>

            <div class="flex-grow-1">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="home.php"><i class="fa fa-home me-2"></i>Página inicial</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="agendar.php"><i class="fa fa-calendar-alt me-2"></i>Agendar atendimento</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a class="nav-link text-white" href="perfil.php"><i class="fa fa-user me-2"></i>Meu perfil</a>
                    </li>
                </ul>
            </div>

            <div>
                <a class="nav-link text-white" href="logout.php"><i class="fa fa-sign-out-alt me-2"></i>Logout</a>
            </div>
        </div>


        <main class="p-4 flex-grow-1">
            <div class="mt-4">
                <img src="assets/img/logo.png" alt="Logo do IFFar" style="height: 60px;">
            </div>
        </main>

    </div>

</body>

</html>
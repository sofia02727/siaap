<?php
session_start();
$_SESSION["msg_popup"] = "Logout realizado com sucesso.";
unset($_SESSION['email']);
unset($_SESSION['logado']);
unset($_SESSION['id_usuario']);
header('Location: index.php');
exit;

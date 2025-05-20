<?php

$servername = "localhost";
$username = "root";
$senha = "";
$db_name = "siaap";

$connect = mysqli_connect($servername, $username, $senha, $db_name);

if (mysqli_connect_error()) {
    echo "Falha na conexão: " . mysqli_connect_error();
}

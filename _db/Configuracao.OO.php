<?php

$servername = "localhost"; //*** dados para acesso local 
$username = "root";
$password = "";
$dbname = "registro";

// Estabelecendo conexão com OO
$conn = new mysqli($servername, $username, $password, $dbname);
// Confere sucesso da conexão
if ($conn->connect_error) {
    die("Problemas ao conectar: " . $conn->connect_error);
}

?>
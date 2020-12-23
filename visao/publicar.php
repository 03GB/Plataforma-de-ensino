<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div class="container">
<?php
session_start(); // Inicia a sessão

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

$sql = "INSERT INTO `post`(`id_U`, `publicacao`) 
		VALUES ('".$_SESSION['id']."', '".$_POST["publicacao"]."')";

if ($conn->query($sql) === TRUE) {
    echo "<br><br><br>Publicação realizada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</div>
</body>
<html>
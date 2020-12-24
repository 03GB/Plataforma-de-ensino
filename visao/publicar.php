<?php
include("../extensao/header.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/estilo_mural.css">
</head>
<body>
	<div class="container">
<?php
session_start(); // Inicia a sessão

include("../_db/Configuracao.OO.php");

$sql = "INSERT INTO `post`(`id_U`, `publicacao`) 
		VALUES ('".$_SESSION['id']."', '".$_POST["publicacao"]."')";

if ($conn->query($sql) === TRUE) {
    echo "<br><br><br><h4>Publicação realizada com sucesso!</h4>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="../visao/mural.php"><h6>Voltar ao mural</h6></a>
</div>
</body>
<html>
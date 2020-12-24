<?php  

include("../extensao/header.php");

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/estilo_mural.css">
	<title>Mural de postagens</title>
</head>
<body>
<br><br>
<div class="container" style="background-color:#f1f1f1">
</body>
</html>


<?php

include("../_db/Configuracao.OO.php");

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
	
//***** sql para buscar qual user ta logado
if (!isset($_POST["nome"]))
{
	$sql = "SELECT `id`, `nome` FROM `usuarios`  
		WHERE id = ".$_SESSION['id'];
}else
{	
	$sql = "SELECT `id`, `nome`, `senha` FROM `usuarios`  
			WHERE nome = '".$_POST["nome"]."' AND senha = '".$_POST["password"]."'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Resultado
    while($row = $result->fetch_assoc()) {
		$_SESSION['id'] = $row["id"];

		echo "<h4> Olá ".$row["nome"]."!</h4>";		
    }
	
	echo "<br>";
	echo "	<div id=\"caixa-div\">
			<div id=\"caixa\">
				  <form action=\"publicar.php\" method=\"post\">
				
					<label for=\"lblpublicacao\">Faça uma nova publi&ccedil&atildeo</label>
					<textarea id=\"publicacao\" name=\"publicacao\" placeholder=\"Digite algo..\" style=\"height:100px\" required></textarea>

					<input type=\"submit\" value=\"Publicar\">
				  </form>
			</div>
			</div>";
			
	//*************** INICIO DA listagem de todos os posts ***********
	$sql = "SELECT post.id_P,post.publicacao,post.reg_date,usuarios.nome FROM post,usuarios  
		WHERE post.id_U = usuarios.id order by reg_date DESC";
	
	$result = $conn->query($sql);
	//conta o total de posts feitos 
    $total = $result->num_rows;
	//calcula o número de páginas
    $numPaginas = ceil($total/50);
	//variavel para calcular o início da visualização com base na página atual 
    $inicio = (50*$pagina)-50; 
 
    //seleciona os itens por página 
	
    $sql = "SELECT post.id_P,post.publicacao,DATE_FORMAT(post.reg_date, \"%d/%m/%Y às %H:%i\") as reg_date,usuarios.nome FROM post,usuarios 
			WHERE post.id_U = usuarios.id  order by reg_date DESC limit ".$inicio.",10"; 
			
	
    $result = $conn->query($sql); 
   
		if ($result->num_rows > 0) {
			// Resultado dos posts feito por todos usuários com cadastro
			echo "<div class=\"container\">
					<table> ";
			while($row = $result->fetch_assoc()) {
				echo "
					  <tr>
						<td>Publicado por ". $row["nome"]." em ".$row["reg_date"]."</td> 
					  </tr>
					  <tr>
						<td><form action=\"\" method=\"post\">
							<input type=\"hidden\" name=\"postID\" value=".$row["id_P"]." /> 
							". $row["publicacao"]." 
							<br><br>
							</form>
						</td>
					  </tr>";		
			} 
		} else {
			echo "Nenhuma publi&ccedil&atildeo feita. ";
		}
//**************************************************************************
} else {
	echo "Desculpe mas o usuário ou a senha não foram encontrados.<br>Deseja se <a href=\"../visao/registro.php\">cadastrar</a> ou voltar para a tela de <a href=\"../visao/login.php\">login</a>?";
}
$conn->close();
?>

  </div>

</body>
</html>
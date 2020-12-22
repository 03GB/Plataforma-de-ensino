<?php
	include('../extensao/header.php');
	include_once('../_db/Configuracao.inc.php');
	// inicializa a sessão
session_start();

// verifica se o usuário está logado, se não estiver redireciona para a página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/estilo.css" rel="stylesheet">
		<title>Mural de Recados</title>
	</head>
	<body>
		<?php

					if(isset($_POST['recado'])){
						$recado = $_POST['recado'];
						$result_recado = "INSERT INTO recados (recado, created) VALUES ('$recado', NOW())";						
						$resultado_recados= mysqli_query($link, $result_recado);
						//Enviar e-mail
					}
		?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Mural de recados</h1>
				<form action="" method="POST">

					<div class="form-group">
						<label for="exampleInputEmail1">Recado:</label>
						<textarea  name="recado" class="form-control" rows="3"></textarea>
					</div>
					<input type="submit" class="btn btn-danger" value="Enviar">
				</form>
				
				<h2>Recados</h2>
				<?php
					$result_recado_bd = "SELECT * FROM recados";
					$resultado_recado_bd = mysqli_query($link, $result_recado_bd);
					if(mysqli_num_rows($resultado_recado_bd) <= 0 ){
						echo "Nenhum recado...";
					}else{
						while($rows = mysqli_fetch_assoc($resultado_recado_bd)){
							?>							
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading"><?php echo $rows['nome']; ?></h4>
									<?php echo $rows['recado']; ?>
								</div>
							</div>
							<?php
						}
					}
				?>				
			</div>
		</div>

<?php
include ('../extensao/footer.php');
?>

	</body>
</html>
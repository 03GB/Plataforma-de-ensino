<?php

include ('../extensao/header.php');
include ('../modelo/dados_perfil.php');

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
</head>
<body>
  
<h2>Meu Perfil</h2>

<form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post">
  <hr />

    <div class="form-group col-md-7">
      <label for="name">Nome / Razão Social</label>
      <input type="text" class="form-control" name="usuario['nome']" value="<?php echo $usuario['nome']; ?>">
    </div>
 
    <div class="form-group col-md-2">
      <label for="campo3">Data de Nascimento</label>
      <input type="text" class="form-control" name="usuario['birthdate']" value="<?php echo $usuario['birthdate']; ?>">
    </div>
 
    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="usuario['dtusuario']" disabled value="<?php echo $usuario['dtRegistro']; ?>">
    </div>
 
    <div class="form-group col-md-2">
      <label for="campo3">Celular</label>
      <input type="text" class="form-control" name="usuario['mobile']" value="<?php echo $usuario['mobile']; ?>">
    </div>
 
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="../visao/pag01.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

</body>
</html>

<?php

include ('../extensao/footer.php');

?>
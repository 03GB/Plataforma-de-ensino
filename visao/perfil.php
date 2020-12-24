<?php
// inicializa a sessão
session_start();

// verifica se o usuário está logado, se não estiver redireciona para a página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// importa o arquivo de configuração
require_once "../_db/Configuracao.inc.php";

// cria e inicializa as variáveis com ""
$new_username = $confirm_password = "";
$new_username_err = $confirm_password_err = "";

// testa se o método utilizado foi o POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // valida a nova senha
    if(empty(trim($_POST["new_username"]))){
        $new_username_err = "Por favor entre com a nova senha.";
    } elseif(strlen(trim($_POST["new_username"])) < 6){
        $new_username_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $new_username = trim($_POST["new_username"]);
    }

    // valida a confirmação da senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_username_err) && ($new_username != $confirm_password)){
            $confirm_password_err = "As senhas digitadas são diferentes.";
        }
    }

    // checa erros de entrada antes de inserir no bd
    if(empty($new_username_err) && empty($confirm_password_err)){
        // prepara a query de atualização
        $sql = "UPDATE usuarios SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // vincula as variáveis à instrução preparada com parâmetros
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // cria um hash para a senha
            $param_password = password_hash($new_username, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // executa a query preparada
            if(mysqli_stmt_execute($stmt)){
                // senha atualizada, destrói a sessão e redireciona para a página de login
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Desculpe! Algo errado aconteceu. Por favor tente novamente.";
            }

            // fecha a query
            mysqli_stmt_close($stmt);
        }
    }

    // encerra a conexão
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/estilo_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá <?php echo $_SESSION["nickname"]; ?>!</h2>
                <p class="description description-primary">Esse é seu perfil</p>
                <p class="description description-primary">Você pode editá-lo, caso desejar.</p>
			   <a href="../visao/pag01.php"> <button class="btn btn-primary">Voltar</button> </a> 
			   <br>
			   <a href="../visao/newpassword.php"> <button class="btn btn-primary">Alterar senha</button> </a>
			   <br>
			   <a href="../visao/avatar.php"> <button class="btn btn-primary">Adicionar avatar</button> </a> 
			   <br>
			   <a href="../visao/informacoes.php"> <button class="btn btn-primary">Visualizar informações</button> </a> 
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Perfil</h2>

                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    

                <div class="form-group">
                <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email"  name="username" class="form-control" value="<?php echo $_SESSION["username"]; ?>">
                    </label>
                 </div>
				
				<div class="form-group">
                 <label class="label-input" for="">
                        <i class="fas fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome de usuário" name="nickname" class="form-control" value="<?php echo $_SESSION["nickname"]; ?>">
                    </label>
                    <span class="help-block"></span>
				</div>
				
				<div class="form-group">
                 <label class="label-input" for="">
                        <i class="fas fa-phone icon-modify"></i>
                        <input type="number" placeholder="Telefone" name="telefone" class="form-control" value="<?php echo $_SESSION["telefone"]; ?>">
                    </label>
				</div>
				

                   <input type="submit" class="btn btn-primary" value="Editar">
                   
                </form>
            </div>
        </div>
    </div>
</body>
</html>

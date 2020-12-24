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
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// testa se o método utilizado foi o POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

// validação da senha
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9 && A-Z || a-z]{4,50}$/', $_POST["new_password"])) { 
    $new_password_err = "A senha deve conter letras, números e entre 4 e 50 caracteres.";
 } elseif(empty(trim($_POST["new_password"]))){
    $new_password_err = "Por favor entre com a senha.";
 } else{
    $new_password = trim($_POST["new_password"]);
}
  

    // valida a confirmação da senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "As senhas digitadas são diferentes.";
        }
    }

    // checa erros de entrada antes de inserir no bd
    if(empty($new_password_err) && empty($confirm_password_err)){
        // prepara a query de atualização
        $sql = "UPDATE usuarios SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // vincula as variáveis à instrução preparada com parâmetros
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // cria um hash para a senha
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // executa a query preparada
            if(mysqli_stmt_execute($stmt)){
               
                header("location: newpassword.php");
            
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
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo_login.css">
</head>
<body>
    <div class="container">

        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá <?php echo $_SESSION["nickname"];?></h2>
                <p class="description description-primary">Aqui você pode modificar sua senha</p>
                <a href="../visao/perfil.php"> <button class="btn btn-primary">Perfil</button> </a>
                <a href="../visao/pag01.php"> <button class="btn btn-primary">Voltar</button> </a>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Alterar senha</h2>

                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
              <label class="label-input" for="">
                     <i class="fas fa-lock icon-modify"></i>
                     <input type="password" placeholder="Senha" name="new_password" class="form-control">
               </label>
            </div>
                   
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <label class="label-input" for="">
                 <i class="fas fa-lock icon-modify"></i>
                 <input type="password" placeholder="Confirme a senha" name="confirm_password" class="form-control">
              </label>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
                    
                   <input type="submit" class="btn btn-primary" value="Editar senha">
                   <input type="reset" class="btn btn-primary" value="Limpar">
     
                </form>
            </div>
        </div>
    </div>

</body>
</html>
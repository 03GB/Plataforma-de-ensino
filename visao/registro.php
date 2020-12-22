<?php

// importação do arquivo config.php
require_once "../_db/Configuracao.inc.php";

// criação das variáveis para controle de acesso
$username             = "";
$password             = "";
$confirm_password     = "";
$username_err         = "";
$password_err         = "";
$confirm_password_err = "";

// testa se o método utilizado foi o POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // valida o nome do usuário
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor entre com seu nome de usuário (login).";
    } else{
        // prepara a query para execução
        $sql = "SELECT id FROM usuarios WHERE nome = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // vincula as variáveis à instrução preparada com parâmetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // define o parâmetro
            $param_username = trim($_POST["username"]);

            // executa a query preparada
            if(mysqli_stmt_execute($stmt)){
                // guarda o resultado
                mysqli_stmt_store_result($stmt);
                // verifica se o usuário existe
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuário já existe.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Desculpe! Algo errado aconteceu. Por favor tente novamente.";
            }

            // fecha a query preparada
            mysqli_stmt_close($stmt);
        }
    }

// validação da senha
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9 && A-Z || a-z]{4,50}$/', $_POST["password"])) { 
    $password_err = "A senha deve conter letras, números e entre 4 e 50 caracteres.";
 } elseif(empty(trim($_POST["password"]))){
    $password_err = "Por favor entre com a senha.";
 } else{
    $password = trim($_POST["password"]);
}
  
// Confirmação da senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "As senhas digitadas são diferentes.";
        }
    }

    // checa erros de entrada antes de inserir no bd
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        // prepara a query de inclusão
        $sql = "INSERT INTO usuarios (nome, password) VALUES (?, ?)";
        echo "Realizou a preparação <br>";
        var_dump($stmt);

        if($stmt = mysqli_prepare($link, $sql)){
            // vincula as variáveis à instrução preparada com parâmetros
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // define o parâmetro
            $param_username = $username;

            //  cria um hash para a senha
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // executa a query preparada
            if(mysqli_stmt_execute($stmt)){
                // redireciona para página de login
                header("location: login.php");
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
                <h2 class="title title-primary">Bem-vindo!</h2>
                <p class="description description-primary">Para se manter conectado conosco</p>
                <p class="description description-primary">por favor faça o login com suas informações pessoais</p>
                <a href="./login.php"> <button class="btn btn-primary">Login</button> </a>
                <a href="../index.php"> <button class="btn btn-primary">Voltar</button> </a>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Criar Conta</h2>

                <p class="description description-second">use seu e-mail para registro:</p>

                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                  <label class="label-input" for="">
                    <i class="far fa-envelope icon-modify"></i>
                    <input type="email" placeholder="Email" name="username" class="form-control" value="<?php echo $username; ?>">
                  </label>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
                   
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label class="label-input" for="">
                     <i class="fas fa-lock icon-modify"></i>
                     <input type="password" placeholder="Senha" name="password" class="form-control" value="<?php echo $password; ?>">
               </label>
            </div>
                   
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <label class="label-input" for="">
                 <i class="fas fa-lock icon-modify"></i>
                 <input type="password" placeholder="Confirme a senha" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
              </label>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
                    
                   <input type="submit" class="btn btn-primary" value="Cadastrar">
                   <input type="reset" class="btn btn-primary" value="Limpar">
     
                </form>
            </div>
        </div>
    </div>

</body>
</html>
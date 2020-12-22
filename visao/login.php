<?php
// inicializa a sessão
session_start();
 
/*
verifica se o usuário está logado
*/
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: pag01.php");
    exit;
}
 
// importa do arquivo de configuração
require_once "../_db/Configuracao.inc.php";
 
// cria e inicializa as variáveis com ""
$username = $password = "";
$username_err = $password_err = "";
 
// testa se o método utilizado foi o POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // verifica se o login do Usuário está vazio
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor entre com o login.";
    } else{
        $username = trim($_POST["username"]);
    }
 
    // verifica se a senha do usuário está vazia
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor entre com a senha.";
    } else{
        $password = trim($_POST["password"]);
    }
 
    // valida os dados so usuário
    if(empty($username_err) && empty($password_err)){
        // prepara a query de consulta
        $sql = "SELECT id, nome, password FROM usuarios WHERE nome = ?";
 
        if($stmt = mysqli_prepare($link, $sql)){
            // vincula as variáveis à instrução preparada com parâmetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
 
            // define o parâmetro
            $param_username = $username;
 
            // executa a query preparada
            if(mysqli_stmt_execute($stmt)){
                // guarda o resultado
                mysqli_stmt_store_result($stmt);
 
                // verifica se o usuário existe, se existir verifica a senha
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // vincula as variáveis aos resultados
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    // Obtém resultados de um preparado comando e os coloca nas determinadas variáveis
                    if(mysqli_stmt_fetch($stmt)){
                        // testa a senha (c/ alg. Hash)
                        if(password_verify($password, $hashed_password)){
                            // senha ok, inicia a sessão
                            session_start();
 
                            // armazena os dados nas variáveis de sessão.
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
 
                            // redireciona para a página de boas vindas
                            header("location: pag01.php");
                        } else{
                            // informa que a senha não é válida
                            $password_err = "A senha digitada não é válida.";
                        }
                    }
                } else{
                    // informa que o usuário não existe
                    $username_err = "O usuário digitado não existe.";
                }
            } else {
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
    <link rel="stylesheet" href="../css/estilo_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá amigo!</h2>
                <p class="description description-primary">Insira seus dados pessoais</p>
                <p class="description description-primary">e comece a jornada conosco</p>
               <a href="./registro.php"> <button class="btn btn-primary">Cadastrar</button> </a> 
               <a href="../index.php"> <button class="btn btn-primary">Voltar</button> </a> 
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Entrar</h2>

                <p class="description description-second">use seu e-mail para entrar:</p>

                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email"  name="username" class="form-control" value="<?php echo $username; ?>">
                    </label>
                    <span class="help-block"><?php echo $username_err; ?></span>
                 </div>

                 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                 <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="password" class="form-control">
                    </label>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>

                   <input type="submit" class="btn btn-primary" value="Login">
                   <input type="reset" class="btn btn-primary" value="Limpar">
                   
                </form>
            </div>
        </div>
    </div>
</body>
</html>
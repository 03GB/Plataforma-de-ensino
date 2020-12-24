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
$idavatar = "";


// testa se o método utilizado foi o POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

        $idavatar = ($_POST["idavatar"]);

        $sql = "UPDATE usuarios SET idavatar = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // vincula as variáveis à instrução preparada com parâmetros
            mysqli_stmt_bind_param($stmt, "ii", $param_idavatar, $param_id);

            $param_idavatar = $idavatar;
            $param_id = $_SESSION["id"];
            $_SESSION["idavatar"] = $idavatar;

            // executa a query preparada
            if(mysqli_stmt_execute($stmt)){
               
                header("location: avatar.php");
            
            } else{
                echo "Desculpe! Algo errado aconteceu. Por favor tente novamente.";
            }

            // fecha a query
            mysqli_stmt_close($stmt);
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
                <p class="description description-primary">Aqui você pode escolher seu avatar</p>
                <a href="../visao/perfil.php"> <button class="btn btn-primary">Perfil</button> </a>
                <a href="../visao/pag01.php"> <button class="btn btn-primary">Voltar</button> </a>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Avatar</h2>
<br>
                <div>
                    <img src="../img/foto1.png" alt="" width="70px">      
                    <img src="../img/foto2.png" alt="" width="70px"> 
                    <img src="../img/foto3.png" alt="" width="70px">
                </div>
                <div>
                    <img src="../img/legend1.png" alt="" width="70px">      
                    <img src="../img/legend2.png" alt="" width="70px"> 
                    <img src="../img/legend3.png" alt="" width="70px">
                </div>
                <div>
                    <img src="../img/foto4.png" alt="" width="70px">
                    <img src="../img/foto5.png" alt="" width="70px">
                    <img src="../img/foto6.png" alt="" width="70px">
                </div>
                <div>
                    <img src="../img/legend4.png" alt="" width="70px">      
                    <img src="../img/legend5.png" alt="" width="70px"> 
                    <img src="../img/legend6.png" alt="" width="70px">
                </div>
                <div>
                    <img src="../img/foto7.png" alt="" width="70px">
                    <img src="../img/foto8.png" alt="" width="70px">
                    <img src="../img/foto9.png" alt="" width="70px">
                </div>
                <div>
                    <img src="../img/legend7.png" alt="" width="70px">      
                    <img src="../img/legend8.png" alt="" width="70px"> 
                    <img src="../img/legend9.png" alt="" width="70px">
                </div>
<br><br>
                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   
                <select name="idavatar">
                    <option value="1">Avatar 1</option>
                    <option value="2">Avatar 2</option>
                    <option value="3">Avatar 3</option>
                    <option value="4">Avatar 4</option>
                    <option value="5">Avatar 5</option>
                    <option value="6">Avatar 6</option>
                    <option value="7">Avatar 7</option>
                    <option value="8">Avatar 8</option>
                    <option value="9">Avatar 9</option>
               </select>
                    
                   <input type="submit" class="btn btn-primary" value="Adicionar avatar">
     
                </form>
            </div>
        </div>
    </div>

</body>
</html>
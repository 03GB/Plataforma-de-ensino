<?php
/*
configuração do acesso ao bd
*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registro');
/*
estabelecimento da conexão com o bd
paradigma procedural
não foi utilizado OO
*/
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
/*
teste da conexão
*/
if($link === false){
    die("ERRO: Não foi possível conectar ao Banco de Dados. " . mysqli_connect_error());
}
?>
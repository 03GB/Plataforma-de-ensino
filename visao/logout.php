<?php
  // inicializa a sessão
  session_start();
 
  // destrói todas as variáveis de sessão
  $_SESSION = array();
 
  // destrói a sessão
  session_destroy();
 
  // redireciona para a página de login
  header("location: ../index.php");
  exit;
?>
 

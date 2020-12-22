<?php

require_once('../_db/Configuracao.inc.php');
require_once('../controle/controledadosperfil.php');

$usuarios = null;
$usuario = null;

/**
 *    Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['usuario'])) {

      $usuario = $_POST['usuario'];
      $usuario['modified'] = $now->format("Y-m-d H:i:s");

      update('usuario', $id, $usuario);
      header('location: index.php');
    } else {

      global $usuario;
      $usuario = find('usuario', $id);
    }
  } else {
    header('location: index.php');
  }
}



?>

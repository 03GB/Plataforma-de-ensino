<?php 
include("../_db/Configuracao.inc.php"); 
$consulta = "SELECT nome, dtRegistro FROM usuarios"; $con = $mysqli->query($consulta) or die($mysqli->error); 
?> 

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Tutorial</title> 
    </head> 
    <body> 
      <table border="1"> 
        <tr> 
          <td>Código</td> 
          <td>Nome</td> 
          <td>E-mail</td> 
          <td>Data de Cadastro</td> 
          <td>Ação</td> 
        </tr> 
        <?php while($dado = $con->fetch_array()) { ?> 
        <tr> 
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['id']; ?></td> 
          <td><?php echo $dado['idavatar']; ?></td> 
          <td><?php echo date('d/m/Y', strtotime($dado['dtRegistro'])); ?></td> 
          <td> 
            <a href="usu_editar.php?codigo=<?php echo $dado['usu_codigo']; ?>">Editar</a> 
            <a href="usu_excluir.php?codigo=<?php echo $dado['usu_codigo']; ?>">Excluir</a> 
          </td> 
        </tr> 
        <?php } ?> 
      </table> 
    </body> 
</html>
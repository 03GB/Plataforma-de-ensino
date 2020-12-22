<?php

//Utilizada para resolver aceleração centrípeta.
  function ac($a,$b){

    $quadrado = $a*$a;
    $result = $quadrado / $b;
    return $result;
 }

 //Utilizada para resolver função horária do deslocamento.
 function posicao($a,$b,$c){

  $result = $a + $b*$c;
  return $result;
}


//Utilizada para resolver velocidade média e probabilidade.
function vm_prob($a,$b){

  $result = $a/$b;
  return $result;
}

//Utilizada para resolver função da velocidade MRUV.
function vel($a,$b,$c){

  $result = $a + $b*$c;
  return $result;
}

//Utilizada para resolver função horária MRUV.
function hor($a,$b,$c,$d){

  $result = $a + $b*$c + $d*($c*$c)/2;
  return $result;
}

 ?>

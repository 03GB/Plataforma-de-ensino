<?php
  require_once('../extensao/header.php');
 ?>
 <nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #20c997;" >
   <div class="container-fluid">

     <div class="container px-4">
       <div class="row gx-5">
         <div class="col">
           <div class="bg-transparent" style="text-align:center; color: white;">

            <h1><font face="Roman "> Física </font></h1>

           </div>
         </div>
       </div>
     </div>

   </div>
 </nav>

 <!-- espaço -->
 <div class="container px-4">
   <div class="row gx-5">
     <div class="col" style="height:50px;">
      <div class="bg-transparent"></div>
     </div>
   </div>
 </div>


 <div class="container px-4">
   <div class="row gx-5">
     <div class="col">
      <div class="p-3 border bg-light">




        <div id="areaprincipal">
               <div class="conteudo">
                 <br>
                   <h2 class="center">Movimento Retilíneo Uniformemente Variado</h2> <br>

                   <div>
                    <p class="justify">O Movimento Retilíneo Uniformemente Variado (MRUV) é aquele que é realizado em linha reta, por isso é chamado de retilíneo. Além disso, apresenta variação de velocidade sempre nos mesmos intervalos de tempo. Uma vez que varia da mesma forma, o que revela constância, o movimento é chamado de uniformemente variado.
        <br><br>
        A trajetória reta desse movimento pode ocorrer na horizontal ou na vertical. Exemplo disso é um carro percorrendo uma trecho retilíneo em uma estrada ou um foguete sendo lançado ao espaço.
        <br>
        Desta forma, a média da aceleração é igual a sua variação ocorrida em determinados intervalos de tempo, o que é conhecido como aceleração instantânea.
        <br><br>
        a = Δv / Δt → a = V - Vo / t - to → a = V - Vo / t
        <br><br>
        Desses cálculos, resulta a fórmula de MRUV:
        <br>
        V = Vo + a. t
        <br><br>
        Onde,
        <br>
        v: velocidade (m/s)
        <br>
        vo: velocidade inicial (m/s)
        <br>
        a: aceleração (m/s2)
        <br>
        t: tempo (s)
        <br><br>

        <div class="container">
                     <form action="#formula" method="post">
                        <div class="form-group">
                          <h5>Fórmula função da velocidade</h5>
                          <a id="formula"></a>
                         <label for="vel">Informe a velocidade inicial (m/s):</label>
                         <input type="number" class="form-control"  required="required" name="vel" step="0.1">
                       </div>
                      <div class="form-group">
                         <label for="acl">Informe a aceleração (m/s²):</label>
                         <input type="number" class="form-control"  required="required" name="acl" step="0.1">
                      </div>
                      <div class="form-group">
                          <a id="formula"></a>
                         <label for="tempo">Informe o tempo (s):</label>
                         <input type="number" class="form-control"  required="required" name="tempo" step="0.1" min="0.1">
                       </div>
                      <br>
                      <button type="submit" class="btn btn-primary">Calcular</button>
                    </form>
               </div>
               <br>
               <?php

                   if (isset($_POST["vel"])){

                    include_once "../extensao/formulas.php";

                   $resultado = vel($_POST["vel"],$_POST["acl"],$_POST["tempo"]);
                   echo  "<h4> A velocidade final é de: $resultado m/s. </h4>";

                   }

               ?>

               <br><br>
        <h5>Movimento Retilíneo Uniformemente Acelerado</h5>
        O Movimento Retilíneo Uniformemente Acelerado ocorre quando um corpo cuja velocidade aumenta sempre na mesma proporção ao longo do tempo.
        <br><br>
        Exemplo disso é ligar uma moto que está estacionada (velocidade inicial 0) e começar um percurso. A moto vai ganhando velocidade de forma constante, até atingir o limite que pretende (velocidade diferente e distante de zero).
        <br><br>
        <h5>Movimento Retilíneo Uniformemente Retardado</h5>
        O Movimento Retilíneo Uniformemente Retardado ocorre quando um corpo em movimento reduz a sua velocidade de forma constante ao longo do tempo. Neste caso a aceleração terá sinal negativo.
        <br>
        <br>
        Exemplo disso é uma moto que está em movimento (velocidade diferente e distante de zero) e que têm de desacelerar quando se depara com um grande congestionamento.
        <br>
        Seu motorista poderá reduzir a velocidade de forma constante até chegar a zero.
        <br>
         </p>
                   </div>

                   <h5>Função Horária do MRUV</h5>
        Sabendo-se que a aceleração no MRUV permanece constante podemos calcular a variação do espaço de um móvel no decorrer do tempo.
        <br><br>
        S=So+Vot+at2/2
        <br><br>
        A fórmula acima constitui uma função quadrática (2ºgrau).
        <br><br>

        <form action="#formula1" method="post">
                       <div class="form-group">
                          <h5>Fórmula função horária do MRUV</h5>
                          <a id="formula1"></a>
                         <label for="pos">Informe a posição inicial (m):</label>
                         <input type="number" class="form-control"  required="required" name="pos" step="0.1">
                       </div>
                        <div class="form-group">
                          <a id="formula"></a>
                         <label for="velo">Informe a velocidade inicial (m/s):</label>
                         <input type="number" class="form-control"  required="required" name="velo" step="0.1">
                       </div>
                      <div class="form-group">
                         <label for="aclr">Informe a aceleração (m/s²):</label>
                         <input type="number" class="form-control"  required="required" name="aclr" step="0.1">
                      </div>
                      <div class="form-group">
                          <a id="formula"></a>
                         <label for="temp">Informe o tempo (s):</label>
                         <input type="number" class="form-control"  required="required" name="temp" step="0.1" min="0.1">
                       </div>
                      <br>
                      <button type="submit" class="btn btn-primary">Calcular</button>
                    </form>
               </div>
               <br>
               <?php

                   if (isset($_POST["pos"])){

                    include_once "../extensao/formulas.php";

                   $retorno = hor($_POST["pos"],$_POST["velo"],$_POST["temp"],$_POST["aclr"]);
                   echo  "<h4> A posição final é de: $retorno m. </h4>";

                   }

               ?>

               </div>
            </div>




      </div>
     </div>
   </div>
 </div>

 <br><br>

 <?php
   require_once('../extensao/footer.php');
  ?>

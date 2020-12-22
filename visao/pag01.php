<?php
  require_once('../extensao/header.php');
  include("../_db/Configuracao.inc.php");

 ?>


     <nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #20c997;" >
       <div class="container-fluid">

         <div class="container px-4">
           <div class="row gx-5">
             <div class="col">
               <div class="bg-transparent" style="text-align:center; color: white;">

                <h1><font face="Roman "> Início </font></h1>

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

     <!-- NOME -->
     <div class="container px-4">
       <div class="row gx-5">
         <div class="col" style="height:50px;">
          <div class="bg-transparent">

          <h4> Olá, João Maurício</h4>
            joaomauricio000@outlook.com

          </div>
         </div>
       </div>
     </div>

     <!-- espaço -->
     <div class="container px-4">
       <div class="row gx-5">
         <div class="col" style="height:50px;">
          <div class="bg-transparent"></div>
         </div>
       </div>
     </div>

     <!-- cartões -->
     <div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light">

                   <div class="row row-cols-1 row-cols-md-2 g-4">
                 <div class="col">
                  <div class="card">
                    <img src="../img/aulaonline.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Aula Digital</h5>
                      <p class="card-text">Assista suas aulas digitais.</p>
                      <a href="maestro.php" class="btn" style="background-color:#285e61; color:white"  >Ir para aulas digitais</a>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card">
                 <a href="../visao/maestro.php"> <img src="../img/maestro.png" class="card-img-top" alt="..."></a>  
                    <div class="card-body">
                      <h5 class="card-title">Maestro minhas matérias </h5>
                      <p class="card-text">Acesse todas as suas matérias.</p>
                      <a href="maestro.php" class="btn" style="background-color:#285e61; color:white"  >Ir para maestro</a>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card">
                    <img src="../img/livrosdigitais.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Livros Digitais</h5>
                      <p class="card-text">Acesse a versão digital dos seus materiais didáticos.</p>
                      <a href="maestro.php" class="btn" style="background-color:#285e61; color:white"  >Ir para livros</a>
                    </div>
                  </div>
                 </div>
                 <div class="col" >
                  <div class="card">
                    <img src="../img/perfil.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Meu Perfil</h5>
                      <p class="card-text">Acesse seus dados de Perfil.</p>
                      <a href="maestro.php" class="btn" style="background-color:#285e61; color:white"  >Ir para o perfil</a>
                    </div>
                  </div>
                 </div>
                 </div>

     </div>
    </div>
  </div>
</div>




<!-- espaço -->
<div class="container px-4">
  <div class="row gx-5">
    <div class="col" style="height:50px;">
     <div class="bg-transparent"></div>
    </div>
  </div>
</div>



 <?php
   require_once('../extensao/footer.php');
  ?>

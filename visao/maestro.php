<?php
  require_once('../extensao/header.php');
 ?>

 <nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #20c997;" >
   <div class="container-fluid">

     <div class="container px-4">
       <div class="row gx-5">
         <div class="col">
           <div class="bg-transparent" style="text-align:center; color: white;">

            <h1><font face="Roman "> Maestro </font></h1>

           </div>
         </div>
       </div>
     </div>

   </div>
 </nav>

 <nav class="navbar navbar-expand-lg navbar-light" style="background-color: transparent;" >
   <div class="container-fluid">

     <div class="container px-4">
       <div class="row gx-5">
         <div class="col">
           <div class="bg-transparent" style="text-align:center; color: black;">

            <h4><font face="Roman "> Aqui estão as atividades e matérias enviadas pelos professores:  </font></h4>

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


 <div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
     <div class=""  style="justify-content: center;text-align: center;">

      <a href="matematica.php">
        <button type="button" class="btn btn-outline-primary" style="width: 500px;margin-bottom: 20px;" href="mural.php">
        MATÉMATICA
        </button>
      </a>
       <BR>

      <a href="fisica.php">
        <button type="button" class="btn btn-outline-success" style="width: 500px;margin-bottom: 20px;">
        FÍSICA
        </button>
      </a>
       <BR>
         
       <button type="button" class="btn btn-outline-danger" style="width: 500px;margin-bottom: 20px;">
       HISTÓRIA
       </button>
       <BR>
       <button type="button" class="btn btn-outline-warning" style="width: 500px;margin-bottom: 20px;">
       GEOGRAFIA
       </button>
       <BR>
       <button type="button" class="btn btn-outline-info" style="width: 500px;margin-bottom: 20px;">
       PORTUGUÊS
       </button>
       <BR>
       <button type="button" class="btn btn-outline-success" style="width: 500px;margin-bottom: 20px;">
       SOCIOLOGIA
       </button>
       <BR>
       <button type="button" class="btn btn-outline-info" style="width: 500px;margin-bottom: 20px;">
       FILOSOFIA
       </button>
       <BR>
       <button type="button" class="btn btn-outline-warning" style="width: 500px;">
       BIOLOGIA
       </button>

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

<?php
require_once '../controle/materiasCtl.php';
$lista = new materiasCtl();
?>
<? include "header.php"; ?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
       <h2>Materias </h2>   
     </div>

     <div class="col-lg-6 col-md-6">
      <a href="addMaterias.php"><input type="button" value="Adicionar" class="btn btn-success" ></a>

      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>

            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
         <?php $lista->listar();?>
       </tbody>
     </table>

   </div>
 </div>              
 <!-- /. ROW  -->
 <hr />

 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>

<!-- /. PAGE WRAPPER  -->
</div>



<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../../assets/arquivos/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../../assets/arquivos/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../../assets/arquivos/js/custom.js"></script>


</body>
</html>

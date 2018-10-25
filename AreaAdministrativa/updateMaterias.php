<?php
require '../controle/materiasCtl.php';
$at = new materiasCtl();
?>
<? include 'header.php';?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Registrar</h2>
      </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="registrarusu" id="aluno">
      <form class="registrarusu1" action="../controle/materiasCtl.php" method="post">
        <?php $at->listarAtualizar();?>
      </form>
    </div>
    <!-- /. ROW  -->
    
  </body>
  </html>

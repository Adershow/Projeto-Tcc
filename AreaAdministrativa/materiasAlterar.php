
<?php include 'header.php' ?>
<?php
require '../modelo/DAO/GenericDAO.php';
require '../modelo/Usuario.php';
 $DAO = new GenericDAO();
 $id = $_GET['id'];
		$DAO->query("SELECT * FROM materias WHERE materias.id ='".$id."'");
		 ?>
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
    <?php  function funcao1(){alert("Eu sou um alert!");} ?>
    <div class="registrarusu" id="aluno">
        <form class="registrarusu1" action="../controle/materiasCtl.php"  method="post">
            <?php foreach ($DAO->result() as $usu) {?>
            <input type="text" name="id" value="<?php echo $usu['id']; ?>" class="form-control" readonly="readonly" /><br/>
            <input type="text" name="nome" value="<?php echo $usu['nomes']; ?>" class="form-control"  required="required" /><br/>
            <input type="text" name="descricao" value="<?php echo $usu['descricao']; ?>" class="form-control" required="required"  /><br/>

            <input type="submit" class="btn btn-primary">
        <?php  }  ?>
        </form>

    </div>
    <!-- /. ROW  -->
    
</body>
</html>
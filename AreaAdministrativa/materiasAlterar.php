
<? include 'header.php' ?>
<?php $DAO = new GenericDAO();
		$DAO->query("SELECT * FROM materias WHERE ");
		foreach ($DAO->result() as $usu) {

            $_SESSION['Mid'] = $usu['id'];
            $_SESSION['Mnome'] = $usu['nomes'];
            $_SESSION['Mdescricao'] = $usu['descricao'];
         } ?>
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
            <input type="text" name="id" value="<?php echo $_SESSION['Mid']; ?>" class="form-control" readonly="readonly" /><br/>
            <input type="text" name="nome" value="<?php echo $_SESSION['Mnome']; ?>" class="form-control"  required="required" /><br/>
            <input type="text" name="descicao" value="<?php echo $_SESSION['Mdescricao']; ?>" class="form-control" required="required"  /><br/>
            <input type="submit" class="btn btn-primary">
        </form>

    </div>
    <!-- /. ROW  -->
    
</body>
</html>
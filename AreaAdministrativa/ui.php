
<? include 'header.php' ?>
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
        <form class="registrarusu1" action="../controle/usuarioCtl.php" enctype="multipart/form-data"  method="post">
            <input type="text" name="id" placeholder="ID Automatico" class="form-control" readonly="readonly" /><br/>
            <input type="text" name="nome" placeholder="Nome" class="form-control"  required="required" /><br/>
            <input type="text" name="email" placeholder="Email" class="form-control" required="required"  /><br/>
            <input type="text" name="cpf" placeholder="Digite o CPF, Somente números" class="form-control" size="11" maxlength="11"  required="required" /><br/>
            <input type="text" name="uf" placeholder="uf" class="form-control" size="2" maxlength="2"  required="required" /><br/>
            <input type="text" name="cidade" placeholder="cidade" class="form-control" required="required" /><br/>
            <input type="password" name="senha" placeholder="senha" class="form-control" required="required" /><br/>
            <input type="password" name="confirmarSenha" placeholder="confirmar senha" class="form-control" required="required" /><br/>
            <input type="file" name="imagem" class="form-control-file"/><br/>
            <input type="submit" class="btn btn-primary">
        </form>

    </div>
    <!-- /. ROW  -->
    
</body>
</html>

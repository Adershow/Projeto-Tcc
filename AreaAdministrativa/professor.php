 <?php require '../controle/professorCtl.php'; 
 $lista = new professorCtl();
 ?>
 <?include 'header.php';?>
 <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2> Professores </h2>   
           </div>

           <div class="col-lg-6 col-md-6">
            <h5>Table  Sample One</h5>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Endereco</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>DataNasc</th>
                        <th>Materia</th>
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

<script src="../../assets/arquivos/js/jquery-1.10.2.js"></script>
<script src="../../assets/arquivos/js/bootstrap.min.js"></script>
<script src="../../assets/arquivos/js/custom.js"></script>
</body>
</html>
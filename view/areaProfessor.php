<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../ProjetoFlexbox/assets/MDB/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../ProjetoFlexbox/assets/MDB/css/mdb.min.css" rel="stylesheet">

  <!-- Your custom styles (optional) -->
  <link href="../ProjetoFlexbox/assets/MDB/css/style.css" rel="stylesheet">
  <link href="../ProjetoFlexbox/assets/css/professor.css" rel="stylesheet">
  <link href="../ProjetoFlexbox/assets/css/minhaconta.css" rel="stylesheet">
  <link href="../ProjetoFlexbox/assets/css/areadoprofessor.css" rel="stylesheet">

</head>

<body>
  <?php foreach ($_SESSION['dados'] as $dados) { ?>
   <section>
    <div style="width: 100%">
      <img src="<?php if(!isset($_SESSION['image1'])){?> /ProjetoFlexbox/assets/arquivos/no-thumbnail.png <?php }else{?> /ProjetoFlexbox/controle/arquivos/<?php echo $_SESSION['imagem1'];}?>" alt="thumbnail" class="img-thumbnail">  
      <img src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem'];?>" style="width: 320px;" class="img-perfil">

      <div class="tabela">
        <ul class="list-group" >
          <li class="list-group-item">Nome: <?php echo $dados['nome']; ?></li>
          <li class="list-group-item">Email: <?php echo $dados['email']; ?></li>
          <li class="list-group-item">CPF: <?php echo $dados['cpf']; ?> </li>
          <li class="list-group-item">UF: <?php echo $dados['uf']; ?></li>
          <li class="list-group-item">Cidade: <?php echo $dados['cidade']; ?></li>
        </ul>
      </div>

      <div class="chats">
        <div class="card grey lighten-3 chat-room">
          <div class="card-body">

            <div class="row px-lg-2 px-2">

              <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">

                  <ul class="list-unstyled chat">
                    <li class="d-flex justify-content-between mb-4">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                      <div class="chat-body white p-3 ml-2 z-depth-1">
                        <div class="header">
                          <strong class="primary-font">Brad Pitt</strong>
                          <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                        </div>
                        <hr class="w-100">
                        <p class="mb-0">
                         OI
                        </p>
                      </div>
                    </li>
                    <li class="d-flex justify-content-between mb-4">
                      <div class="chat-body white p-3 z-depth-1">
                        <div class="header">
                          <strong class="primary-font">Lara Croft</strong>
                          <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                        </div>
                        <hr class="w-100">
                        <p class="mb-0">
                          Olá
                        </p>
                      </div>
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                    </li>
                    <li class="d-flex justify-content-between mb-4 pb-3">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                      <div class="chat-body white p-3 ml-2 z-depth-1">
                        <div class="header">
                          <strong class="primary-font">Brad Pitt</strong>
                          <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                        </div>
                        <hr class="w-100">
                        <p class="mb-0">
                          
                        </p>
                      </div>
                    </li>
                    <li class="white">
                      <div class="form-group basic-textarea">
                        <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
                      </div>
                    </li>
                    <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
                  </ul>

                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
        </div>
      </div>
    </div>
  </section>
<?php }?>



<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>
</body>
</html>
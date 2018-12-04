<?php include 'header.php';?>
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="../ProjetoFlexbox/assets/css/chatProfessor.css" rel="stylesheet">


</head>

<body>
  <?php foreach ($_SESSION['dados'] as $dados) {?>
   <section>
     <div style="width: 100%">
      <img data-toggle="modal" data-target="#modalLRFormImagem" alt="thumbnail" src="<?php if($dados['imagem1'] == null){ ?>/ProjetoFlexbox/assets/arquivos/no-thumbnail.png <?php } else{ ?> ../ProjetoFlexbox/controle/arquivos/Professor_<?php echo $dados['cpf']; ?>/<?php echo $dados['imagem1']; } ?>" class="img-thumbnail croppie-container" />
      <img src="../ProjetoFlexbox/controle/arquivos/Professor_<?php echo $dados['cpf']; ?>/<?php echo $dados['imagem']; ?>" style="width: 320px;" class="img-perfil">

      <div class="tabela">
        <ul class="list-group" >
          <li class="list-group-item">CPF: <?php echo $dados['cpf']; ?> </li>
          <li class="list-group-item">UF: <?php echo $dados['uf']; ?></li>
          <li class="list-group-item">Cidade: <?php echo $dados['cidade']; ?></li>
          <li class="list-group-item">Email: <?php echo $dados['email']; ?></li>
          <li class="list-group-item">Nome: <?php echo $dados['nome']; ?></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-sm-offset-4 frame" style="margin-top: -50px;
  height: 300px;
  ">
  <div style="
  max-height: 100px;" id="painel">
  <ul class="chat" id="message-list" style="margin-bottom: 60px;
  max-height: 220px;
  overflow-y: scroll;"></ul>
</div>

<div class="msj-rta macro" style="margin-top: 100px; margin:auto;">                        
  <div class="text text-r">
    <form id="message-form" method="post">
      <input class="mytext" id="message-text" placeholder="Type a message"/>
      <button class="submit" type="submit" style="margin-left: 100%;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    </form>
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
<!-- Chat core JavaScript -->
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="https://unpkg.com/@pusher/chatkit-client@1/dist/web/chatkit.js"></script>

<script type="text/javascript">

  const tokenProvider = new Chatkit.TokenProvider({
    url: "https://us1.pusherplatform.io/services/chatkit_token_provider/v1/af3aa747-66bc-4b25-93d7-bbb125df0f20/token"
  });
  const chatManager = new Chatkit.ChatManager({
    instanceLocator: "v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20",
    userId: "<?php echo $_SESSION['idAlt']; ?>",
    tokenProvider: tokenProvider
  });

  chatManager
  .connect()
  .then(currentUser => {
    currentUser.subscribeToRoom({
      roomId: "<?php echo $_SESSION['roomIntern']['id']; ?>",
      hooks: {
        onMessage: message => {
          console.log('Aderson');
          const ul = document.getElementById("message-list");
          console.log(message);
          if(message.senderId == "<?php echo $_SESSION['idAlt']; ?>"){
            const li = document.createElement("li");
            const p = document.createElement("p");
            li.setAttribute('class', 'sent');
            p.appendChild(document.createTextNode(` ${message.text}`));
            li.appendChild(p);
            ul.appendChild(li);
          }else{
            const li = document.createElement("li");
            const p = document.createElement("p");
            li.setAttribute('class', 'replies');
            p.appendChild(document.createTextNode(`${message.text}`));
            li.appendChild(p);
            ul.appendChild(li);
          }
          
        }
      }
    });

    const form = document.getElementById("message-form");
    form.addEventListener("submit", e => {
      e.preventDefault();
      const input = document.getElementById("message-text");
      currentUser.sendMessage({
        text: input.value,
        roomId: "<?php echo $_SESSION['roomIntern']['id']; ?>"
      });
      input.value = "";
    });
  })
  .catch(error => {
    console.error("error:", error);
  });

</script>
</body>
</html>
<?php include_once '../ProjetoFlexbox/controle/site/chat.php';?>
<?php
ini_set('display_errors', 0);
error_reporting(0);
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- Bootstrap core CSS -->
<link href="../ProjetoFlexbox/assets/MDB/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="../ProjetoFlexbox/assets/MDB/css/mdb.min.css" rel="stylesheet">

<!-- Your custom styles (optional) -->
<link href="../ProjetoFlexbox/assets/css/professor.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>


<!DOCTYPE html><html class=''>
<head>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="../ProjetoFlexbox/assets/css/style.css">
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="../ProjetoFlexbox">Início</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="professor/listarProfessores">Professores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="chat">Chat's</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mais</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="minhaconta/listarDados">Perfil</a>
          <a class="dropdown-item" href="aulas/listarAulas">Aulas marcadas</a>
        </div>
      </li>

    </ul>
    <!-- Links -->
    <form class="form-inline" action="logar/deslogar" method="get">
      <button class="btn btn-danger" style="font-size: 15px;
      border-radius: 7.5px;
      margin-left: 90%;" >LOGOUT</button>
    </form>
  </div>





  <!-- Collapsible content -->
</nav>
<div id="frame" style="margin-top: -25px;
height: 93.5%;">
<div id="sidepanel">
  <div id="profile">

    <img class="Diferete" src="../ProjetoFlexbox/controle/arquivos/<?php if ($_SESSION['tipo'] == 'professor') {echo "Professor_";} else {echo "Usuario_";}
    echo $_SESSION['cpf'];?>/<?php echo $_SESSION['imagem']; ?>" width="50px" height="50px" style="border-radius: 50px;" />
    <span><p style="margin-left: 60px; margin-top: -30px;"><?php echo $_SESSION['login']; ?></p></span>

  </div>
  <div id="search">
   <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
   <input type="text" placeholder="Search contacts..." />
 </div>


 <!---------------------------------------------------------------------------------------------------------------------->
 <!---------------------------------------------------------------------------------------------------------------------->
 <!---------------------------------------------------------------------------------------------------------------------->
 <!---------------------------------------------------------------------------------------------------------------------->





 <div id="contacts">
  <?php if ($_SESSION['tipo'] == 'professor') {
    $_SESSION['idAlt'] = 'Pr.' . $_SESSION['id'];
  } else {
    $_SESSION['idAlt'] = $_SESSION['id'];
  }?>
  <ul>

     <?php foreach ($chatkit->getUserRooms(['id' => $_SESSION['idAlt']])['body'] as $room) {?>
     <?php if (count($room['member_user_ids']) == 2) {
      foreach ($room['member_user_ids'] as $id) {
        if ($_SESSION['idAlt'] != $id) {?>
        <div style="margin-left: 10%;">
        <form action="chat/abreChat" method="post" >
          <button name="id" value="<?php echo $room['id']; ?>" hidden id="inputSubmit<?php echo $room['id']; ?>" ></button>
          <li class="contact" id="chamaSubmit<?php echo $room['id']; ?>">

            <img src="../ProjetoFlexbox/controle/arquivos/<?php echo $chatkit->getUser(['id' => $id])['body']['custom_data']['pasta']; ?>/<?php echo $chatkit->getUser(['id' => $id])['body']['custom_data']['imagem']; ?>" style="border-radius: 50px; width: 50px; height: 50px;" alt="" />
            <script>
              $('#chamaSubmit<?php echo $room['id']; ?>').on('click', function() {
               $('#inputSubmit<?php echo $room['id']; ?>').trigger('click');
             });
           </script>
           <?php }
         }
       }?>
       <div class="meta">
        <p class="name" style="margin-left: 60px; margin-top: -30px;">
          <?php
          if (count($room['member_user_ids']) == 2) {

            foreach ($room['member_user_ids'] as $id) {
              if ($_SESSION['idAlt'] != $id) {

                echo $chatkit->getUser(['id' => $id])['body']['name'];
              }
            }
          }?>
        </p>

        <p class="preview"></p>
      
    </div>
  </li>

</form>
</div>
<?php }?>
</ul>
</div>


</div>

<div class="content">

  <?php if(isset($_SESSION['roomIntern'])){
   foreach ($_SESSION['roomIntern']['member_user_ids'] as $roomIntern) {
    if (count($roomIntern) <= 2) {
      if ($_SESSION['idAlt'] != $roomIntern) {
        ?>
        <div class="contact-profile">
         <img src="../ProjetoFlexbox/controle/arquivos/<?php echo $chatkit->getUser(['id' => $roomIntern])['body']['custom_data']['pasta']; ?>/<?php echo $chatkit->getUser(['id' => $roomIntern])['body']['custom_data']['imagem']; ?>" alt="" />
         <p><?php echo $chatkit->getUser(['id' => $roomIntern])['body']['name']; ?></p>
       </div>
       <?php }
     }
   }
 }?>
 <div class="messages" id="messages">
  <ul id="message-list">
  </ul>
</div>

<div class="message-input">
 <div class="wrap">
   <form id="message-form" method="post">
     <input type="text" placeholder="Write your message..." id="message-text"/>
     <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
     <button class="submit" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
   </form>
 </div>
</div>
</div>


</div>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>

<!-- Pusher ChatKit -->
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
            p.appendChild(document.createTextNode(`${message.text}`));
            li.appendChild(p);
            ul.appendChild(li);
          }else{
            const li = document.createElement("li");
            const p = document.createElement("p");
            li.setAttribute('class', 'replies');
            p.appendChild(document.createTextNode(` ${message.text}`));
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

</body></html>
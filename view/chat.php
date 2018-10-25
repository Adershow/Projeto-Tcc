

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

  <script src="https://use.typekit.net/hoy3lrg.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="../ProjetoFlexbox/assets/css/style.css">

</head><body >
  <nav class="navbar navbar-expand-lg navbar-dark indigo" style="font-family: Roboto">

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
<?php foreach ($_SESSION['dados'] as $dados) { ?>
<div id="frame" style="margin-top: -25px;
height: 93.5%;">
<div id="sidepanel">
  <div id="profile">
   <div class="wrap">
    <img id="profile-img" src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem']; ?>" class="online" alt="" />
    <p><?php echo $dados['nome']; ?></p>
</div>
</div>
<?php } ?>
<div id="search">
 <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
 <input type="text" placeholder="Search contacts..." />
</div>
<div id="contacts">
 <ul>
  <li class="contact">
   <div class="wrap">
    <span class="contact-status online"></span>
    <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
    <div class="meta">
     <p class="name">Louis Litt</p>
     <p class="preview">Eai</p>
   </div>
 </div>
</li>
<li class="contact active">
 <div class="wrap">
  <span class="contact-status busy"></span>
  <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
  <div class="meta">
   <p class="name">Harvey Specter</p>
   <p class="preview">Exemplo de Chat</p>
 </div>
</div>
</li>
<li class="contact">
 <div class="wrap">
  <span class="contact-status"></span>
  <img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
  <div class="meta">
   <p class="name">Harold Gunderson</p>
   <p class="preview">Obrigado</p>
 </div>
</div>
</li>
</ul>
</div>
</div>
<div class="content">
  <div class="contact-profile">
   <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
   <p>Harvey Specter</p>
</div>
<?php foreach ($_SESSION['dados'] as $dados) { ?>
<div class="messages">
 <ul>
  <li class="sent">
   <img src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem']; ?>" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="replies">
   <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="replies">
   <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="sent">
   <img src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem']; ?>" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="replies">
   <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="replies">
   <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="sent">
   <img src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem']; ?>" alt="" />
   <p>Exemplo de Chat</p>
 </li>
 <li class="replies">
   <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
   <p>Exemplo de Chat</p>
 </li>
</ul>
</div>
<?php } ?>
<div class="message-input">
 <div class="wrap">
   <input type="text" placeholder="Write your message..." />
   <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
   <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
 </div>
</div>
</div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
  $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem']; ?>" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
//# sourceURL=pen.js
</script>
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>
</body></html>
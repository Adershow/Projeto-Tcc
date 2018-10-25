<?php
session_start();
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simple Responsive Admin</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="../assets/arquivos/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../assets/arquivos/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="../assets/arquivos/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  
</head>
<body>
  <div id="wrapper">
   <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="../ProjetoFlexbox/assets/arquivos/img" />

        </a>
      </div>
      <div style="display: inline-flex; margin-left: 70%;">
        <div class="loginDiv" >
          
          <li class="login" style="font-size: 20px; color: white;"><?php echo $_SESSION['login'];  ?></a></li>
          <li class="login" style="font-size: 20px; color: white;"><?php echo $_SESSION['email'];  ?></a></li>
          <form action="../logar/deslogar" method="get">
            <button class="btn btn-danger" style="margin-left: 25px;">LOGOUT</button>
          </form>
        </div>
        <div class="loginDiv2"><img width="50px" height="50px" src="../ProjetoFlexbox/controle/arquivos/<?php echo $_SESSION['imagem'];?>" /></div>
      </div>
    </div>
  </div>
</div>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">



      <li>
        <a href="index.php" ><i class="fa fa-desktop"></i>Area Principal</a>
      </li>
      <li>
        <a href="ui.php"><i class="fa fa-table "></i>Registrar ADM</a>
      </li>
      <li>
        <li>
          <a href="usuarios.php"><i class="fa fa-edit "></i>Usuarios </a>
        </li>
        <li>
          <a href="professor.php"><i class="fa fa-edit "></i>Professores</a>
        </li>
        <li>
          <a href="materias.php"><i class="fa fa-bar-chart-o"></i>Materias</a>
        </li>
      </ul>
    </div>

  </nav>
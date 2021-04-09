<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./assets/css/templateAdmin.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>
</style>
</head>
<body style=" background: linear-gradient(#e66465, #9198e5); min-height:1000px">

<div class="sidenav" style=" background: linear-gradient(#3399ff, #3333ff);" >

<div class="text-center">
<img src="./assets/images/p.png" alt="" width="160">
</div>
<div style="height:10px"></div>
<a href="index.php" class="text-center font-verdana">Back to the future</a>
<h2 class="text-end text-center text-white">Bonjour</br><?php 
  if(isset($_SESSION['Auth'])){
    echo $_SESSION['Auth']->nom;
     } ?>
     </h2>
  
<?php if(isset($_SESSION['Auth'])){ ?>
<a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>

<div style="height:10px"></div>
  
  <button class="dropdown-btn"><i class="fas fa-layer-group text-white"></i>Articles
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="index.php?action=list_a"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=add_a"><i class="fas fa-plus"></i>Ajout</a>
  </div>

  <button class="dropdown-btn"><i class="fas fa-layer-group text-white"></i>Categorie
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="index.php?action=list_cat"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=add_cat"><i class="fas fa-plus"></i>Ajout</a>
  </div>
  
  <?php 
  if($_SESSION['Auth']->role != 3) {
    ?>

  <button class="dropdown-btn"><i class="fas fa-users text-white"></i>Utilisateurs  
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <?php if($_SESSION['Auth']->role == 1) { ?>
    <a href="index.php?action=list_u"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=inscription"><i class="fas fa-plus"></i>Inscription</a>
    <?php } ?>
  </div>

  <?php }} ?>
</div>

<div class="main">
  <div style="height:20px"></div>
  <div class="container">
    <h1 class="card border-dark text-center text-dark rounded-pill" style="background-image: url('./assets/images/lvb.jpg'); " >ADMINISTRATION</h1>
  </div>
  <?= $contenu; ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="./assets/js/templateAdmin.js"></script>
<script src="./assets/js/scriptAjax.js"></script>


</body>
</html> 

<?php ob_start(); 
 
?>

<div class="container p-5  mt-5" style="min-height:750px">
  <div class="row">
    <div class="col-3">
  
    </div>
    <div class="col-6 text-center border border-secondary rounded ">
    <h1 class="text-success mb-5">Confirmation de commande</h1>
    <img src="./assets/images/yellow.jpg" width="400" alt="">
    <p class=" text-secondary display-6 ">Merci pour votre achat <p>
    <div class="row">
        <div class="col-6 offset-3">
    <a href="index.php" style="text-decoration: none"><p class=" border border-secondary text-success border border-3 h4 rounded-pill mt-3">a très bientôt<p></a>
        </div>
    </div>
    </div>
    <div class="col-3">
     
    </div>
  </div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>
<?php ob_start(); 

//var_dump($cars)
?>


<div class="container">
    <h1 class="text-center display-2"><img src="./assets/images/error.png" width="50" alt="">Erreur 404<img src="./assets/images/error.png" width="50" alt=""></h1>
        <div class="alert alert-danger text-center">
            <?= $errorMsg?>
            <img src="./assets/images/marouane.jpg" width="700" alt="" >
        </div>
      
            
                  
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>
<?php ob_start();
?>


<div class="container p-5 mt-5" style="min-height: 750px;">
<div class="row">
  <div class="col-12">
    <div class="card mb-3 p-1" >
      <div class="row g-0">
        <div class="col-md-4 p-5">
          <img src="./assets/images/<?=$image;?>" class="rounded-3" width="450px" alt="..." >
        </div>
        <div class="col-4  p-5">
          <div class="card-body">
            <h5 class="card-title text-center mt-5 ml-5"><?=$titre;?></br><?=$auteur;?></h5>
            <p class="card-text text-center text-danger h5 ml-5">Prix: <?=$prix;?> €</p>
          </div>
        </div>
  <div class="col-4 p-3 mt-5">
  <h4 class="text-center ">Validation</h4>
    <form>
      <label for="email">Email*</label>
      <input type="email"id="email" class="form-control" placeholder="Votre email svp...">
      <label for="quant">Quantite*</label>
      <input type="number" id="quantite" class="form-control" name="quantite" min="1" max="1000" value="1" >
      <input type="hidden" id="id" value="<?=$id;?>">
      <input type="hidden" id="titre" value="<?=$titre;?>">
      <input type="hidden" id="auteur" value="<?=$auteur;?>">
      <input type="hidden" id="prix" value="<?=$prix;?>">
      <input type="hidden" id="description" value="<?=$description;?>">


      <button id="checkout-button" class="btn btn-success col-12 mt-2">Valider</button>
    </form>
  </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>
<?php ob_start(); 


?>

<div class="container" style="margin-left:470px"  >
  
  <div id="carouselExampleControls" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/images/co2.jpg" class="d-block w-50 "  alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/kanye.jpg" class="d-block w-50" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/me.jpg" class="d-block w-50"  alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!--------------------------end carrousel------------------------------------->

<div class="container bg-secondary p-5 mt-3 mb-3 " style="background-image: url('./assets/images/studio.jpg')" >
    <div class="row my-3">
              <div class="col-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach($arts as $art){?>
                    <div class="col">
                      <div class="card">
                        <img src="./assets/images/<?= $art->getImage();?>" class="card-img-top" height="300" alt="...">
                        <div class="card-body">
                          <h5 class="card-title border border-primary text-primary text-center"><span class="text-secondary"><?=strtoupper($art->getCategorie()->getNom_cat());?></span> : <?= $art->getTitre();?></h5>
                          <p class="card-text"><?= substr($art->getDescription(), 0,600);?></p>
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Auteur:
                              <span class="badge text-danger rounded-pill"><?= $art->getAuteur();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Date:
                              <span class="badge text-danger rounded-pill"><?= $art->getDate();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Prix:
                              <span class="badge bg-danger rounded-pill"><?= $art->getPrix();?>€</span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                            <form action="index.php?action=checkout" method="post">
                                <input type="hidden" name="id_article" value="<?= $art->getId_art();?>">
                                <input type="hidden" name="titre" value="<?= $art->getTitre();?>">
                                <input type="hidden"  name="auteur"value="<?= $art->getAuteur();?>">
                                <input type="hidden" name="image" value="<?= $art->getImage();?>">
                                <input type="hidden"  name="prix" value="<?= $art->getPrix();?>">
                                <input type="hidden"  name="description" value="<?= $art->getDescription();?>">
                                  <button type="submit" name="envoi" class="btn btn-success text-white"> Acheter</button>
                            </form>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    
              </div>
      </div>
<!------------------------------end cards--------------------------------------------------------->
            <div class="col-4 ">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
                        <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-secondary bg-info" name="soumis"><i class="fas fa-search"></i></button>
                     </form>
                <div class="card mt-5">
                    <ul class="list-group list-group-flush">
                      <?php foreach($tabCat as $cat){ ?>
                        <li class="list-group-item text-center mt-2">
                          <a class="btn text-center" href="index.php?action=accueil&id=<?=$cat->getId_cat();?>"><?=ucfirst($cat->getNom_cat());?></a>
                        </li>
                      <?php } ?>
                     
                    </ul>
                </div> 
              </div>
<!------------------------------end sidebar--------------------------------------------------------->          
    </div>
 </div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>
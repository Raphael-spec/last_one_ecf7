<?php ob_start();?>
<div style="height:20px"></div>
 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-warning text-center font-monospace text-decoration-underline">Modifier l'article N°00<?=$editArt->getId_art();?></h1>
         <div style="height:40px"></div>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col">
                        <label for="marque">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" value="<?=$editArt->getTitre();?>" >
                    </div>
                    <div class="col">
                        <label for="modele">Auteur</label>
                        <input type="text" id="auteur" name="auteur" class="form-control" value="<?=$editArt->getAuteur();?>" >
                    </div>
                    <div class="col">
                        <label for="cat">Catégorie</label>
                        <select id="cat" name="cat" class="form-select">
                        <option value="<?=$editArt->getCategorie()->getId_cat();?>">
                        <?php
                        foreach ($tabCat as  $cat) {
                             if($cat->getId_cat() == $editArt->getCategorie()->getId_cat()) {
                                 echo $cat->getNom_cat();
                                }
                            }
                        ?>
                        
                        </option>
                        <?php foreach ($tabCat as  $cat) { if($cat->getId_cat() != $editArt->getCategorie()->getId_cat()) {?>
                           
                      
                        
                        <option value="<?=$cat->getId_cat();?>"><?=$cat->getNom_cat();?></option>
                        <?php  } } ;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="container col-6 ">
                        <label for="prix">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?=$editArt->getDate();?>" >
                   
                        <label for="prix">Prix</label>
                        <input type="number" id="prix" name="prix" class="form-control" value="<?=$editArt->getPrix();?>" >
                        
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
                    <div class="container  col-6 ">
                            <img src="./assets/images/<?=$editArt->getImage();?>" alt="" width="400" class="img-thumbnail mt-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="desc">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="La description" rows="5"><?=$editArt->getDescription();?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning  col-6 offset-3 mt-2" name="soumis">Modifier</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>
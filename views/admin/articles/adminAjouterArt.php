<?php ob_start();?>
<div style="height:20px"></div>
 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center text-success font-monospace text-decoration-underline">Ajout d'articles</h1>
         <div style="height:40px"></div>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col">
                        <label for="marque">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" placeholder="Entrez votre titre" >
                    </div>
                    <div class="col">
                        <label for="modele">Auteur</label>
                        <input type="text" id="auteur" name="auteur" class="form-control" placeholder="Entrez l'auteur" >
                    </div>
                    <div class="col">
                        <label for="cat">Catégorie</label>
                        <select id="cat" name="cat" class="form-select">
                        <option value="">Choisir</option>
                        <?php foreach ($tabTheme as  $the) {;?>
                           
                      
                        <option value="<?=$the->getId_cat();?>"><?=$the->getNom_cat();?></option>
                        <?php   } ;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control"  >
                    </div>
                    <div class="col">
                        <label for="prix">Prix</label>
                        <input type="number" id="prix" name="prix" class="form-control"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="desc">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="entrez votre article" rows="5"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success  col-6 offset-3 mt-2" name="soumis">Insérer</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>
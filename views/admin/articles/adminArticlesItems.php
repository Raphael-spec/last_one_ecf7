<?php ob_start();?>
<div style="height:20px"></div>
<h1 class="  display-6 text-center font-verdana text-decoration-underline">Listes des Articles</h1>
<div style="height:30px"></div>

<div class="row">
    <div class="col-4 offset-8">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="input-group">
            <input  class="form-control text-center " type="search" name="search" id="search" placeholder="Rechercher..." >
            <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<div style="height:40px"></div>
<table class="table table-striped">
      <thead>
          <tr>
              <th>Id</th>
              <th>Titre</th>
              <th>Auteur</th>
              <th>Image</th>
              <th>Description</th>
              <th>Date</th>
              <th>Prix</th>
              <th>Categorie</th>
              <th colspan="2" class="text-center">Actions</th>
          </tr>
      </thead>
     <tbody>
          
          <tr>
          <?php if(is_array($rubr)){ foreach ($rubr as  $rub) { ?>
              <td><?=$rub->getId_art();?></td>
              <td><?=$rub->getTitre();?></td>
              <td><?=$rub->getAuteur();?></td>
              <td><img src="./assets/images/<?=$rub->getImage();?>" alt="" width="100"></td>
              <td ><?=substr($rub->getDescription(),0,400);?></td>
              <td><?=$rub->getDate();?></td>
              <td><?=$rub->getPrix();?></td>
              <td><?=$rub->getCategorie()->getNom_cat();?></td>
              <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=modif_a&id=<?=$rub->getId_art();?>">
                    <i class="fas fa-pen"></i>
                </a>
              </td>
              <?php if($_SESSION['Auth']->role != 3){ ?>
              <td  class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_a&id=<?=$rub->getId_art();?>"
                    onclick="return confirm('Etes vous sûr de ...')">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
              <?php } ?>
          </tr>
          <?php }}else{ echo"<tr class='text-center text-danger'><td colspan='10' >".$rubr."</td></tr>";} ?>
      </tbody>
  </table>

<?php
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>

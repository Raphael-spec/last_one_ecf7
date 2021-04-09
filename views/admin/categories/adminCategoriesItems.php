<?php ob_start();?>
<div style="height:20px"></div>
<h1 class="display-6 text-center font-verdana text-decoration-underline">Listes des Categories</h1>
<div style="height:40px"></div>
<table class="table table-striped border border-white">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allCat as $cat) { ?>
        <tr>
            <td><?=$cat->getId_cat();?></td>
            <td><?=ucfirst($cat->getNom_cat());?></td>
            <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=modif_cat&id=<?=$cat->getId_cat();?>">
                <i class="fas fa-pen"></i></a>
            </td>

            <?php if($_SESSION['Auth']->role != 3){ ?>
            <td class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_cat&id=<?=$cat->getId_cat();?>"
                onclick="return confirm('Etes vous sûr de ...')">
                <i class="fas fa-trash"></i></a>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>

</table>


<?php
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>
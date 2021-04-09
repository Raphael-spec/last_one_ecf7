<?php ob_start();?>
<div style="height:20px"></div>
<h1 class="display-6 text-center font-verdana text-decoration-underline">Listes des Utilisateurs</h1>
<div style="height:40px"></div>
<table class="table table-striped border border-white">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
            <th>Email</th>
            <th>Poste</th>
            <?php if($_SESSION['Auth']->role == 1){ ?>
            <th class="text-center">In/Out</th>
            <th colspan="2" class="text-center">Actions</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allUsers as $user) { ?>
        <tr>
            <td><?=$user->getId();?></td>
            <td><?=$user->getNom();?></td>
            <td><?=$user->getPrenom();?></td>
            <td><?=$user->getLogin();?></td>
            <td><?=$user->getEmail();?></td>
            
            <?php if ($user->getRole() ==1){

                            echo'<td>superadmin</td>';

                            }else if($user->getRole() ==2){
                            echo'<td>admin</td>';


                            }else{

                            echo'<td>user</td>';

                            }?>

            <?php if($_SESSION['Auth']->role == 1){ ?>          
            
            <td class="text-center">
             
                <?php
                    echo ($user->getStatut())
                    ? "<a href='index.php?action=list_u&id=".$user->getId()."&statut=".$user->getStatut()."' onclick='return confirm(`Etes-vous sûr de vouloir désactiver ?`)' class='btn btn-success'><i class='fas fa-unlock'>Désactiver</i></a>"
                    : "<a href='index.php?action=list_u&id=".$user->getId()."&statut=".$user->getStatut()."' onclick='return confirm(`Etes-vous sûr de vouloir activer ?`)' class='btn btn-danger'><i class='fas fa-lock'>Activer</i></a>"
                ?>
            </td>
            <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=modif_u&id=<?=$user->getId();?>">
                    <i class="fas fa-pen"></i>
                </a>
              </td>
              <td  class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_u&id=<?=$user->getId();?>"
                    onclick="return confirm('Etes vous sûr de ...')">
                    <i class="fas fa-trash"></i>
                </a>
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


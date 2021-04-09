<?php ob_start();

?>

<div class="container">
<h1 class="text-center display-6 text-warning font-verdana text-decoration-underline mb-4 mt-4">Formulaire de modification de l'utilisateur N°00<?=$editUs->getId();?></h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" enctype="multipart/form-data">

                <div class="row mt-3">
                    <div class="col">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="<?=$editUs->getNom();?>">
                    </div>
                    <div class="col">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?=$editUs->getPrenom();?>">
                    </div>
                    <div class="col">
                        <label for="role">Poste</label>
                        <select id="role" name="role" class="form-select">

                        <?php  if ($editUs->getRole() ==1){

                                        echo'<option value="1">Superadmin</option>';

                                        }else if($editUs->getRole() ==2){
                                        echo'<option value="2">Admin</option>';


                                        }else{

                                        echo'<option value="3">User</option>';

                                        }?>
                            <option value="1">Superadmin</option>
                            <option value="2">Admin</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" class="form-control" value="<?=$editUs->getLogin();?>">
                    </div>
                    <div class="col">
                        <label for="mail">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?=$editUs->getEmail();?>">
                    </div>
                </div>
                <div class="col-6 offset-3">
                        <label for="pass">Mot de passe</label>
                        <input type="pass" id="pass" name="pass" class="form-control" value="<?=$editUs->getPass();?>">
                    </div>
                <button type="submit" class="btn btn-warning  col-12 mt-3" name="soumis">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>
<?php ob_start();

?>

<div class="container">
<h2 class="text-center text-secondary display-6 font-verdana text-decoration-underline mb-4 mt-4">Formulaire d'inscription des utilisateurs</h2>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" enctype="multipart/form-data">

                <div class="row mt-3">
                    <div class="col">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez le nom">
                    </div>
                    <div class="col">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Entrez le prénom">
                    </div>
                    <div class="col">
                        <label for="role">Poste</label>
                        <select id="role" name="role" class="form-select">
                            <option value="">Choisir</option>
                            <option value="1">Supa Admin</option>
                            <option value="2">Juste Admin</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" class="form-control" placeholder="Entrez le login">
                    </div>
                    <div class="col">
                        <label for="mail">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Entrez le mail">
                    </div>
                </div>
                <div class="col-6 offset-3">
                        <label for="pass">Mot de passe</label>
                        <input type="pass" id="pass" name="pass" class="form-control" placeholder=" Mot de Passe">
                    </div>
                <button type="submit" class="btn btn-secondary col-12  mt-3" name="submit">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>
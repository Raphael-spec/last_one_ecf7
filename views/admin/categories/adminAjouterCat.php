<?php ob_start();?>
<div style="height:20px"></div>
<h1 class="display-6 text-center text-success font-verdana text-decoration-underline">Ajout de categories</h1>

<div style="height:40px"></div>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">

            <form action="index.php?action=add_cat" method="post">

                <label for="categorie">Catégorie</label>
                <input type="text" id="categorie" name="categorie" class="form-control mt-2" placeholder="Veuillez entrer votre categorie">
                <button  type="submit" class="btn btn-success col-6 offset-3 mt-2" name="soumis">Insérer</button>
            </form>


        </div>
    </div>
</div>


<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');

?>
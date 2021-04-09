<?php ob_start(); 

//var_dump($cars)
?>


<div class="container">
    <h2>Echec au cours du paiement</h2>
    <p>Vérifiez vos cordonnées bancaires, lors du chargement des données !<p>

        
</div>

<?php $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>
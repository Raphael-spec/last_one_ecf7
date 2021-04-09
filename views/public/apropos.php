<?php ob_start();  ?>

    <div class="container ">
            <h1 class="text-center bg-danger col-8 offset-2 mt-5 text-white display-3 ">BADNeWs</h1>
           
                <h4 class="text-center col-6 offset-3 mt-5">
                BADNeWS, la Journal d’information en continu, a de nombreuses perspectives de recrutement dans les prochaines années. La rédaction du journal n’a cessé de grandir depuis sa création en 2005, et attire de plus en plus de jeunes diplômés d’écoles de journalisme. Sofiane MAMERI, secrétaire général de la rédaction du journal, décrit les différents types de profils recherchés par le journal et donne plus de détails sur la collaboration de BADNeWS avec les différentes écoles de journalisme françaises.
                </h4>
        
    
              <div class="container col-8 offset-2 mt-5">

              <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card border-success">
                        <img src="./assets/images/ma.png" class="card-img-top"  alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center">Marouane TALBI <br> a.k.a <br> "Gandalf"</h3>
                                <p class="card-text">Jeune reporter tout fraichement arrivé d'espagne. Spécialiste dans l'actualité footballistique. Ancien joueur professionnel du Réal Madrid. Il est la pièce maitresse de la rubrique football et un élément clé pour nous relater les journées de la liga...  </p>
                            </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-danger">
                        <img src="./assets/images/fa.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center">Fatima MEKKAOUI</h3>
                                <p class="card-text">Elle est la plus jolie, la plus douce en matière de cinema. Elle travaille depuis  des années au sein de notre société. Elle a interviewé de nombreuses stars pour les promotions des films. Sa force principale sa culture cinématographique</p>
                            </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-info">
                        <img src="./assets/images/na.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center">Nathalie BENDAVID</h3>
                                <p class="card-text">Aucne question ne reste sans réponse. Nathalie est un vrai dictionnaire sur l'actualité high-tech . Elle saura vous apporter toutes les informations nécessaires aux nouvelles technologies. Spécialisée Full-stack en developpement web, nouveaux languages et infos toutes fraîches concernant la silicon valley... Vous pourrez les lire le lendemain sur la page web du site </p>
                            </div>
                    </div>
                </div>
            </div>
       
    </div>
    <div style="height: 50px"></div>
    <?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>

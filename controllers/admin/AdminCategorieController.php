<?php

// require_once('../../models/Driver.php');
// require_once('../../models/Categorie.php');
// require_once('../../models/admin/AdminCategorieModel.php');

class AdminCategorieController{

    private $admCat;

    public function __construct()
    {
        $this->admCat = new AdminCategorieModel();
    }

    public function listCategories(){

        AuthController::isLogged();

        $allCat = $this->admCat->getCategories();
        require_once('./views/admin/categories/adminCategoriesItems.php');
    }

    public function suppCat(){

        AuthController::isLogged();
        AuthController::accessUser();

        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
           
            $id = trim($_GET['id']);
            
            $nbLine = $this->admCat->deleteCat($id);

            if($nbLine > 0){
                    header('location:index.php?action=list_cat');
                }

        }
    }

    public function modifCat(){

        AuthController::isLogged();

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
           
            $id = trim($_GET['id']);
           
            $cat = $this->admCat->recupCategorie($id);

            if(isset($_POST['soumis']) && !empty($_POST['categorie'])){ 

                $categorie = trim(addslashes(htmlentities($_POST['categorie'])));
                
                $cat->setNom_cat($categorie);

                $sese = $this->admCat->updateCategorie($cat);

                if($sese > 0){

                    header('location:index.php?action=list_cat');
                }
                
            }

         require_once('./views/admin/categories/adminEditionCat.php');

        }
    }

    public function ajoutCat(){

        AuthController::isLogged();

        if(isset ($_POST['soumis']) && !empty($_POST['categorie'])){
            $nom_cat = trim(htmlentities(addslashes($_POST['categorie'])));

            $ajCat = new Categorie();
            $ajCat->setNom_cat($nom_cat);

            $oui = $this->admCat->insertCategorie($ajCat);

                if($oui){

                     header('location:index.php?action=list_cat');
                }
            
                
                
            }
            require_once('./views/admin/categories/adminAjouterCat.php');
    }
}
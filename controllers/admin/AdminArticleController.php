<?php

class AdminArticleController{

    private $aacAr;

    public function __construct()
    {
        $this->aacAr = new AdminArticleModel(); 
        $this->acmCat = new AdminCategorieModel();
  
    }

    public function listArticles(){

      AuthController::isLogged();
          
        if(isset($_POST['soumis']) && !empty($_POST['search'])){
              
              $search = trim(htmlspecialchars(addslashes($_POST['search'])));
              $rubr = $this->aacAr->getArticles($search);
              require_once('./views/admin/articles/adminArticlesItems.php');
    
          }else{
  
            $rubr = $this->aacAr->getArticles();
            require_once('./views/admin/articles/adminArticlesItems.php');
     
          }
      }

      public function AjoutArticles(){

        AuthController::isLogged();
  
  
        if (isset($_POST['soumis']) && !empty($_POST['titre']) && !empty($_POST['auteur'])){
  
            $titre = trim(htmlentities(addslashes($_POST['titre'])));
            $auteur = trim(htmlentities(addslashes($_POST['auteur'])));
            $date = trim(htmlentities(addslashes($_POST['date'])));
            $prix = trim(htmlentities(addslashes($_POST['prix'])));
            $description = trim(htmlentities(addslashes($_POST['description'])));
            $id_cat = trim(htmlentities(addslashes($_POST['cat'])));
            $image = $_FILES['image']['name'];
  
            $newA = new article();
            $newA->setTitre($titre);
            $newA->setAuteur($auteur);
            $newA->setDate($date);
            $newA->setPrix($prix);
            $newA->getCategorie()->setId_cat($id_cat);
            $newA->setDescription($description);
            $newA->setImage($image);
  
            
            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
            
            $yes = $this->aacAr->insertArticle($newA);
            if($yes){
  
              header('location:index.php?action=list_a');
            }
  
  
           
        }
  
        //
        $tabTheme = $this->acmCat->getCategories();
        require_once('./views/admin/articles/adminAjouterArt.php');
  
      }
      public function modifArticle(){

        AuthController::isLogged();
        
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
            $modifA = new Article();
            $modifA->setId_art($id);
            $editArt = $this->aacAr->articleRecup($modifA);
            
           $tabCat = $this->acmCat->getCategories();
           
           if(isset($_POST['soumis']) && !empty($_POST['titre']) && !empty($_POST['auteur'])){
               
               $titre = trim(htmlentities(addslashes($_POST['titre'])));
               $auteur = trim(htmlentities(addslashes($_POST['auteur'])));
               $date = trim(htmlentities(addslashes($_POST['date'])));
               $prix = trim(htmlentities(addslashes($_POST['prix'])));
               $id_cat = trim(htmlentities(addslashes($_POST['cat'])));
               $description = trim(htmlentities(addslashes($_POST['description'])));
               $image = $_FILES['image']['name'];
               
               $editArt->setTitre($titre);
               $editArt->setAuteur($auteur);
               $editArt->setDate($date);
               $editArt->setPrix($prix);
               $editArt->getCategorie()->setId_cat($id_cat);
               $editArt->setDescription($description);
               $editArt->setImage($image);
               
               $destination = './assets/images/';
               move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
               
               $thumbsUp = $this->aacAr->updateArticle($editArt); 
               
               
                   header('location:index.php?action=list_a');
                
            }
            require_once('./views/admin/articles/adminEditionArt.php');
        }
    }

    public function suppArticle(){
        
      AuthController::isLogged();
      AuthController::accessUser();
        
      if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
          
          $id = $_GET['id'];
          $suppA = new Article();
          $suppA->setId_art($id);
          $yep = $this->aacAr->deleteArticle($suppA);
  
            if($yep > 0){
                    header('location:index.php?action=list_a');
                }
  
         }
  
      }
}
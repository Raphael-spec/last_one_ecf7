<?php
// require_once('./models/Driver.php');
// require_once('./models/Categorie.php');
// require_once('./models/admin/AdminCategorieModel.php');
// require_once('./controllers/admin/AdminCategorieController.php');
require_once('./app/autoload.php');

class Router{

    private $ctrCat;
    private $ctrAr;
    private $ctrUs;

    public function __construct()
    {
        $this->ctrCat = new AdminCategorieController();
        $this->ctrAr = new AdminArticleController();
        $this->ctrUs = new AdminUserController();
        $this->ctrpub = new PublicController();

    }


    public function getPath(){

        try{
            if(isset($_GET['action'])){

                switch($_GET['action']){
                    
                            case 'list_cat':
                                $this->ctrCat->listCategories();
                                break;

                            case 'delete_cat':
                                $this->ctrCat->suppCat();
                                break;

                            case 'modif_cat':
                                $this->ctrCat->modifCat();
                                break;

                            case 'add_cat':
                                $this->ctrCat->ajoutCat();
                                break;

                            case 'list_a':
                                $this->ctrAr->listArticles();
                                break;

                            case 'add_a':
                                $this->ctrAr->AjoutArticles();
                                break;

                            case 'modif_a':
                                $this->ctrAr->modifArticle();
                                break;

                            case 'delete_a':
                                $this->ctrAr->suppArticle();
                                break;
                            
                            case 'list_u':
                                $this->ctrUs->listUsers();
                                break;

                            case 'delete_u':
                                $this->ctrUs->suppUser();
                                break;

                            case 'modif_u':
                                $this->ctrUs->ModifUser();
                                break;

                            case 'login':
                                $this->ctrUs->login();
                                break;

                            case 'inscription':
                                $this->ctrUs->ajoutUser();
                                break;

                            case 'logout':
                                AuthController::logout();
                                break;

                            case 'checkout':
                                $this->ctrpub->recap();
                                break;

                            case 'contact':
                                 $this->ctrpub->contact();
                                break;
                            
                            case 'apropos':
                                 $this->ctrpub->apropos();
                                break;

                            case 'accueil':
                                $this->ctrpub->getPubArticles();
                                 break;

                            case 'pay':
                                $this->ctrpub->payment();
                                break;

                            case 'success':
                                $this->ctrpub->confirmation();
                                break;

                            case 'cancel':
                                $this->ctrpub->annuler();
                                break;

                            case 'validation':
                                $this->ctrpub->validation();
                                break;

                            default:
                                throw new Exception('Action non définie');

                    }    
        }else{

            $this->ctrpub->home();
            session_unset();

        } 

        }catch(Exception $e){
            
            $this->page404($e->getMessage());
        }
    }
    
    private function page404($errorMsg){
        
        $errorMsg =  '<p  class="text-center display-5">Appeller Marouane</p>';
        require_once('./views/notfound.php');
    }
}

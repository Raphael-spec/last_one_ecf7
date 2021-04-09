<?php

class AdminUserController{
    
    private $aumUs;

        public function __construct()
        {
            $this->aumUs = new AdminUserModel();
        }

    public function listUsers(){

        AuthController::isLogged();

        if(isset($_GET['id']) && isset($_GET['statut']) && !empty($_GET['id'])){ 
            
            $id = $_GET['id'];
            $statut = $_GET['statut'];
            $user = new Utilisateurs();
            if($statut == 1){
                $statut = 0;
            }else{
                $statut = 1;
            }

            $user->setId($id);
            $user->setStatut($statut);
            $this->aumUs->updateStatut($user);
        }    
        $allUsers = $this->aumUs->getUsers();
        require_once('./views/admin/utilisateurs/adminUsersItems.php');
    }

    public function login(){
        
        if(isset($_POST['soumis'])){
            
            if(strlen($_POST['pass']) >= 4 && !empty($_POST['loginEmail'])){
               
                $loginEmail = trim(htmlentities(addslashes($_POST['loginEmail'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                
                $log_u = $this->aumUs->signIn($loginEmail, $pass);
                
                    if(!empty($log_u)){
                         
                        if($log_u->statut > 0){
                            
                            session_start();
                            $_SESSION['Auth'] = $log_u;
                            
                            header('location:index.php?action=list_a');
        
                        }else{
        
                            $error = "Votre compte a été supprimé";
                        }
                    
                    }else{
                         
                        $error = "Votre login/email ou/et mot de passe ne corespondent pas"; 
               
                    }
            }else{
                
                $error = "Entrée les données valides"; 
    
            }
        
        }
            
        require_once('./views/admin/utilisateurs/login.php');
    
    }

    public function ajoutUser(){

        AuthController::isLogged();
        
        if(isset($_POST['submit'])){

            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && strlen($_POST['pass']) >= 4){
        
                
                $nom = trim(htmlentities(addslashes($_POST['nom'])));
                $prenom = trim(htmlentities(addslashes($_POST['prenom'])));
                $login = trim(htmlentities(addslashes($_POST['login'])));
                $email = trim(htmlentities(addslashes($_POST['email'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                $role = (trim(htmlentities(addslashes($_POST['role']))));

                $user = new Utilisateurs();
                    $user->setNom($nom);
                    $user->setPrenom($prenom);
                    $user->setLogin($login);
                    $user->setEmail($email);
                    $user->setPass($pass);
                    $user->setRole($role);
                    $user->setStatut(1);
            
                    $si_senor = $this->aumUs->inscript($user);
                
                if($si_senor){
                    
                    header('location:index.php?action=list_u');
                }
            }
        
         }
            
                require_once('./views/admin/utilisateurs/inscription.php');

    }

    public function suppUser(){

        AuthController::isLogged();
        
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
          
          $id = $_GET['id'];
          
          $delU = new Utilisateurs();
          $delU->setId($id);
          $yo = $this->aumUs->deleteUser($delU);
  
            if($yo > 0){
                    header('location:index.php?action=list_u');
                }
  
         }
  
      }
      public function ModifUser(){

        AuthController::isLogged();
        
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            
            $id = $_GET['id'];
            
            $modifU = new Utilisateurs();
            
            $modifU->setId($id);
            $editUs = $this->aumUs->recupUser($modifU);
            
           if(isset($_POST['soumis']) && !empty($_POST['login']) && !empty($_POST['pass'])){
               
               $nom = trim(htmlentities(addslashes($_POST['nom'])));
               $prenom = trim(htmlentities(addslashes($_POST['prenom'])));
               $login = trim(htmlentities(addslashes($_POST['login'])));
               $email = trim(htmlentities(addslashes($_POST['email'])));
               $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
               $role = trim(htmlentities(addslashes($_POST['role'])));
               
               $editUs->setNom($nom);
               $editUs->setPrenom($prenom);
               $editUs->setLogin($login);
               $editUs->setEmail($email);
               $editUs->setPass($pass);
               $editUs->setRole($role);
               $editUs->setStatut(1);
               
               $ok = $this->aumUs->updateUser($editUs); 
              
            //    var_dump($_POST);
            //    echo'bonjour';
                header('location:index.php?action=list_u');
                
            }
            require_once('./views/admin/utilisateurs/adminEditU.php');
        }
    }
}
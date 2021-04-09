<?php

class AdminUserModel extends Driver{

    public function getUsers(){
        $sql = "SELECT *
                FROM utilisateurs";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabUser = [];

        foreach($rows as $row){

            $user = new Utilisateurs();

            $user->setId($row->id);
            $user->setNom($row->nom);
            $user->setPrenom($row->prenom);
            $user->setLogin($row->login);
            $user->setEmail($row->email);
            $user->setPass($row->pass);
            $user->setRole($row->role);
            $user->setStatut($row->statut);
            
            array_push($tabUser,$user);

        }
            return $tabUser;

    }

    public function updateStatut(Utilisateurs $user){

        $sql = "UPDATE utilisateurs
        SET statut = :statut
        WHERE id = :id";

        $result = $this->getRequest($sql, ['statut'=>$user->getStatut(), 'id'=>$user->getId()]);
           
            return $result->rowCount();

    }

    public function signIn($loginEmail, $pass){
       
       $sql = "SELECT *
                FROM utilisateurs
                WHERE (login = :logEmail OR email = :logEmail) AND pass = :pass";
        
        $result = $this->getRequest($sql,['logEmail'=>$loginEmail, 'pass'=>$pass]);

        $row = $result->fetch(PDO::FETCH_OBJ);

        return $row;
    }

     public function inscript(Utilisateurs $user){
        
        $sql = "SELECT *
                FROM utilisateurs
                WHERE email = :email";
        
        $result = $this->getRequest($sql, ['email'=>$user->getEmail()]);
        
        if($result->rowCount() == 0){
            
            $sql = "INSERT INTO utilisateurs(nom, prenom, login, email, pass, role, statut)
                    VALUES(:nom, :prenom, :login, :email, :pass, :role, :statut)";
           
           $tabUsers = ['nom'=>$user->getNom(), 
                        'prenom'=>$user->getPrenom(), 
                        'login'=>$user->getLogin(), 
                        'email'=>$user->getEmail(), 
                        'pass'=>$user->getPass(), 
                        'role'=>$user->getRole(), 
                        'statut'=>$user->getStatut(),
                        ];
            
                $res = $this->getRequest($sql, $tabUsers);
            
                return $res;
        }else{
                return "Cet utilisateur existe déjà";

        }
    }
    
    public function deleteUser(Utilisateurs $user){
        $sql = "DELETE FROM utilisateurs
                WHERE id = :id";
        
        $result = $this->getRequest($sql, ['id'=>$user->getId()]);
        
            return $result->rowCount();
        
       
    }

    public function recupUser(Utilisateurs $user){
        $sql = "SELECT *
                FROM utilisateurs
                WHERE id = :id";
        
        $result = $this->getRequest($sql, ['id'=>$user->getId()]);

        
        if($result->rowCount() > 0){
            
            $userRow = $result->fetch(PDO::FETCH_OBJ);
            
            $editUser = new Utilisateurs();
            $editUser->setId($userRow->id);
            $editUser->setNom($userRow->nom);
            $editUser->setPrenom($userRow->prenom);
            $editUser->setLogin($userRow->login);
            $editUser->setEmail($userRow->email);
            $editUser->setPass($userRow->pass);
            $editUser->setRole($userRow->role);

            return $editUser;
        }

    }

    public function updateUser(Utilisateurs $upU){
            $sql = "UPDATE utilisateurs
                    SET nom = :nom, prenom = :prenom, login = :login, email = :email, pass = :pass, role = :role
                    WHERE id = :id";
            
        $tabParams = [  "nom"=>$upU->getNom(),
                        "prenom"=>$upU->getPrenom(), 
                        "login"=>$upU->getLogin(), 
                        "email"=>$upU->getEmail(), 
                        "pass"=>$upU->getPass(), 
                        "role"=>$upU->getRole(), 
                        "id"=>$upU->getId()
                    ];
        

          $result = $this->getRequest($sql, $tabParams);

         return $result->rowCount();
    }

}
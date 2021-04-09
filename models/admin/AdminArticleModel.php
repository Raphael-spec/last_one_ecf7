<?php

class AdminArticleModel extends Driver{

    public function getArticles($search = null){

        if(!empty($search)){
            $sql = "SELECT *
                    FROM article a
                    INNER JOIN categorie c
                    ON a.id_categorie = c.id_cat
                    WHERE titre LIKE :titre OR auteur LIKE :auteur OR nom_cat LIKE :nom_cat OR prix LIKE :prix
                    ORDER BY id_art DESC";
                     
             $searchOrth = ["titre"=>"$search%", "auteur"=>"$search%", "nom_cat"=>"$search%", "prix"=>"$search%" ];
                    
            $result = $this->getRequest($sql, $searchOrth);
        }else{

            $sql = "SELECT *
                    FROM article a
                    INNER JOIN categorie c
                    ON a.id_categorie = c.id_cat
                    ORDER BY id_art DESC";

            $result = $this->getRequest($sql);
        }

        $articles = $result->fetchAll(PDO::FETCH_OBJ);

        $donnees = [];

        foreach($articles as $art){

            $pape = new Article();
            $pape->setId_art($art->id_art);
            $pape->setTitre($art->titre);
            $pape->setAuteur($art->auteur);
            $pape->setImage($art->image);
            $pape->setDescription($art->description);
            $pape->setDate($art->date_created);
            $pape->setTitre($art->titre);
            $pape->setPrix($art->prix);
            $pape->getCategorie()->setId_cat($art->id_cat);
            $pape->getCategorie()->setNom_cat($art->nom_cat);
            array_push($donnees, $pape);

        }
        if($result->rowCount() > 0){
            return $donnees;
        }else{
            return "No Records...";
        }
    }

    public function insertArticle(article $article){

        $sql = "INSERT INTO article(titre, auteur, date_created, image, description, prix, id_categorie)
                VALUES(:titre, :auteur, :date, :image, :description, :prix, :id_categorie)";
        
        $tabParame = [

            "titre"=>$article->getTitre(),
            "auteur"=>$article->getAuteur(),
            "date"=>$article->getDate(),
            "image"=>$article->getImage(),
            "prix"=>$article->getPrix(),
            "description"=>$article->getDescription(),
            "id_categorie"=>$article->getCategorie()->getId_cat()
                ];

        //recupere pour faire l'insertion

        $result = $this->getRequest($sql, $tabParame);

        return $result;

    }

    public function articleRecup(Article $mag){
        $sql = "SELECT *
                FROM article
                WHERE id_art = :id";
        
        $result = $this->getRequest($sql, ['id'=>$mag->getId_art()]);

        
        if($result->rowCount() > 0){
            
            $magazine = $result->fetch(PDO::FETCH_OBJ);
            
            $mPaper = new Article();
            
            $mPaper->setId_art($magazine->id_art);
            $mPaper->setTitre($magazine->titre);
            $mPaper->setAuteur($magazine->auteur);
            $mPaper->setDate($magazine->date_created);
            $mPaper->setImage($magazine->image);
            $mPaper->setPrix($magazine->prix);
            $mPaper->setDescription($magazine->description);
            $mPaper->getCategorie()->setId_cat($magazine->id_categorie);
            // $editVoiture->getCategorie()->setNom_cat($voitureRow->nom_cat);

            return $mPaper;
        }

    }

    public function updateArticle(Article $upMag){
        if($upMag->getImage() === ""){
           
           $sql = "UPDATE article
                    SET titre = :titre, auteur = :auteur, date_created = :date, description = :description, prix = :prix, id_categorie = :id_categorie
                    WHERE id_art = :id_art";
            
        $tabPaname = [  "titre"=>$upMag->getTitre(),
                        "auteur"=>$upMag->getAuteur(), 
                        "date"=>$upMag->getDate(), 
                        "prix"=>$upMag->getPrix(), 
                        "description"=>$upMag->getDescription(), 
                        "id_categorie"=>$upMag->getCategorie()->getId_cat(), 
                        "id_art"=>$upMag->getId_art()
                    ];
        }else{

            $sql = "UPDATE article
                    SET titre = :titre, auteur = :auteur, date_created = :date, image = :image, description = :description, prix = :prix, id_categorie = :id_categorie
                    WHERE id_art = :id_art";
                    
                    $tabPaname = [  "titre"=>$upMag->getTitre(),
                                    "auteur"=>$upMag->getAuteur(), 
                                    "date"=>$upMag->getDate(), 
                                    "image"=>$upMag->getImage(),
                                    "prix"=>$upMag->getPrix(), 
                                    "description"=>$upMag->getDescription(), 
                                    "id_categorie"=>$upMag->getCategorie()->getId_cat(), 
                                    "id_art"=>$upMag->getId_art()
                ];
        }
        

          $result = $this->getRequest($sql, $tabPaname);

         return $result->rowCount();
    }

    public function deleteArticle(Article $article){
        $sql = "DELETE FROM article
                WHERE id_art = :id";
        
        $result = $this->getRequest($sql, ['id'=>$article->getId_art()]);
        
        return $result->rowCount();
        
       
    }

}
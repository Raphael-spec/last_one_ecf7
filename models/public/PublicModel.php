<?php

class PublicModel extends Driver{

    public function findArticlesByCat(Article $art){

        $sql = "SELECT * 
        FROM article a
        INNER JOIN categorie c
        ON a.id_categorie = c.id_cat
        WHERE a.id_categorie=:id";
        
        $result = $this->getRequest($sql, ["id"=>$art->getCategorie()->getId_cat()]);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $arts = [];
        foreach($rows as $row){

            $newArt = new Article();

            $newArt->setId_art($row->id_art);
            $newArt->setTitre($row->titre);
            $newArt->setAuteur($row->auteur);
            $newArt->setImage($row->image);
            $newArt->setDescription($row->description);
            $newArt->setPrix($row->prix);
            $newArt->setDate($row->date_created);
            $newArt->getCategorie()->setId_cat($row->id_cat);
            $newArt->getCategorie()->setNom_cat($row->nom_cat);

            array_push($arts, $newArt);

        }
        return $arts;
    }

    // public function updateStock(Article $a){
    //     $sql = "UPDATE article
    //             SET quantite = :quantite
    //             WHERE id_art = :id";

    //     $result = $this->getRequest($sql,['quantite'=>$a->getQuantite(), 'id'=>$a->getId_art()]);

    //     return $result->rowCount();
    // }
}
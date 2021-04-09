<?php

class Article{

        private $id_art;
        private $titre;
        private $auteur;
        private $image;
        private $description;
        private $date;
        private $categorie;
        private $prix;

        public function __construct()
        {
            $this->categorie = new Categorie();
        }

         /**
         * Get the value of id_v
         */ 
        public function getId_art()
        {
                return $this->id_art;
        }

        /**
         * Set the value of id_v
         *
         * @return  self
         */ 
        public function setId_art($id_art)
        {
                $this->id_art = $id_art;

                return $this;
        }

        /**
         * Get the value of marque
         */ 
        public function getAuteur()
        {
                return $this->auteur;
        }

        /**
         * Set the value of marque
         *
         * @return  self
         */ 
        public function setAuteur($auteur)
        {
                $this->auteur = $auteur;

                return $this;
        }

        /**
         * Get the value of modele
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of modele
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of annee
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of annee
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of categorie
         */ 
        public function getCategorie()
        {
                return $this->categorie;
        }

        /**
         * Set the value of categorie
         *
         * @return  self
         */ 
        public function setCategorie($categorie)
        {
                $this->categorie = $categorie;

                return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }




        /**
         * Get the value of prix
         */ 
        public function getPrix()
        {
                return $this->prix;
        }

        /**
         * Set the value of prix
         *
         * @return  self
         */ 
        public function setPrix($prix)
        {
                $this->prix = $prix;

                return $this;
        }
}
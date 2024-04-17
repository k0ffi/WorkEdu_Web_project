<?php

class Etudiant {
    private $nom;
    private $prenom;
    private $id;
    private $listeCours;

    public function __construct($nom, $prenom, $id, $listeCours) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id = $id;
        $this->listeCours = $listeCours; 
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getListeCours() {
        return $this->listeCours;
    }

    public function setListeCours($listeCours) {
        $this->listeCours = $listeCours;
    }
}

?>

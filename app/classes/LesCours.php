<?php

class LesCours {
    private $listeCours;

    public function __construct($listeCours) {
        $this->listeCours = $listeCours;
    }

    public function getListeCours() {
        return $this->listeCours;
    }

    public function setListeCours($listeCours) {
        $this->listeCours = $listeCours;
    }

    public function getCoursByIndex($index) {
        if ($index >= 0 && $index < count($this->listeCours)) {
            return $this->listeCours[$index];
        } else {
            throw new Exception("Index hors limites.");
        }
    }

    public function ajouterCours($cours) {
        $this->listeCours[] = $cours;
    }

    public function coursEstDansLaListe($cours) {
        foreach ($this->listeCours as $c) {
            if ($c === $cours) {
                return true;
            }
        }
        return false;
    }

    public function supprimerCours($index) {
        if ($index >= 0 && $index < count($this->listeCours)) {
            array_splice($this->listeCours, $index, 1);
        } else {
            throw new Exception("Index hors limites.");
        }
    }


}
?>
<?php

abstract class NiveauCours {
    const FAIBLE = "faible";
    const MOYEN = "moyen";
    const BON = "bon";
}

class Cours {
    private $typeCours;
    private $nomCours;
    private $qcm;
    private $niveau;
    private $dataVideo;
    private $dataDiapo;

    public function __construct($typeCours, $nomCours, $qcm, $niveau, $dataVideo, $dataDiapo) {
        $this->typeCours = $typeCours;
        $this->nomCours = $nomCours;
        $this->qcm = $qcm;
        $this->setNiveau($niveau);
        $this->dataVideo = $dataVideo;
        $this->dataDiapo = $dataDiapo;
    }

    public function getTypeCours() {
        return $this->typeCours;
    }

    public function setTypeCours($typeCours) {
        $this->typeCours = $typeCours;
    }

    public function getNomCours() {
        return $this->nomCours;
    }

    public function setNomCours($nomCours) {
        $this->nomCours = $nomCours;
    }

    public function getQcm() {
        return $this->qcm;
    }

    public function setQcm($qcm) {
        $this->qcm = $qcm;
    }

    public function getNiveau() {
        return $this->niveau;
    }

    public function setNiveau($niveau) {
        if (in_array($niveau, [NiveauCours::FAIBLE, NiveauCours::MOYEN, NiveauCours::BON])) {
            $this->niveau = $niveau;
        } else {
            throw new Exception("Niveau invalide pour le cours.");
        }
    }

    public function getDataVideo() {
        return $this->dataVideo;
    }

    public function setDataVideo($dataVideo) {
        $this->dataVideo = $dataVideo;
    }

    public function getDataDiapo() {
        return $this->dataDiapo;
    }

    public function setDataDiapo($dataDiapo) {
        $this->dataDiapo = $dataDiapo;
    }
}

?>

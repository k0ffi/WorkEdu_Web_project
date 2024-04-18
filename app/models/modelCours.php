<?php

class ModelCours {
    protected $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getCoursByFiliere($filiere_id) {
        $query = "SELECT * FROM cours WHERE filiere_id = :filiere_id";
        $params = [':filiere_id' => $filiere_id];
        $result = $this->database->read($query, $params);
        return $result;
    }


    
}

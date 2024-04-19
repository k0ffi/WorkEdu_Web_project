<?php

class ModelListe {
    protected $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllUsers() {
        $query = "SELECT firstname,lastname FROM users WHERE admin = :admin";
        $params = [':admin' => 0];
        $result = $this->database->read($query,$params);
        return $result;
    
    
    }


    
}

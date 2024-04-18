<?php

class Signup extends Controller
{
    function index()
    {
        $user = $this->loadModel("modelUser");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $user->signup($data);
        }

        // Récupérer la liste des filières depuis le modèle
        $data['filieres'] = $user->getAllFilieres();

        $data['page_title'] = "Inscription";
        $this->view("connection/signup", $data);
    }
}
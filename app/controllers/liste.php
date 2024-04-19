<?php

class Liste extends Controller
{
    function index()
    {
        $data['page_title'] = "Liste des étudiants";
        $listeModel = $this->loadModel('modelListe');
        $liste_etu = $listeModel->getAllUsers();
        $data['liste_etu'] = $liste_etu;
        $this->view("liste_etu", $data);

    }
}
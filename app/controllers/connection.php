<?php

class Connection extends Controller
{
    function index()
    {
        
        $user = $this->loadModel("modelUser");
        $user->login($_POST);

        $data['page_title'] = "Connexion";
        $this->view("connection/connection", $data);
    }
}
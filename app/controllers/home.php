<?php

class Home extends Controller
{
    function index()
    {
        $data['page_title'] = "Accueil";
        $this->view("home", $data);
    }
}
<?php

class Logout extends Controller
{
    function index()
    {
        $data['page_title'] = "Déconnexion";
        $this->view("logout", $data);
    }
}
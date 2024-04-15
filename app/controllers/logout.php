<?php

class Logout extends Controller
{
    function index()
    {
        $data['page_title'] = "Déconnexion";
        $data['username'] = $_SESSION['username'];
        $data['firstname'] = $_SESSION['firstname'];
        session_unset();
        session_destroy();
        $this->view("logout", $data);
    }
}
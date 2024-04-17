<?php

class Loginadmin extends Controller
{
    function index()
    {
         if (isset($_POST['username']) && isset($_POST['password']))
        {
            $user = $this->loadModel("admin");
            $user->login($_POST);
        }

        $data['page_title'] = "Connexion";
        $this->view("loginadmin", $data);
    }
}
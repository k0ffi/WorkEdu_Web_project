<?php

class Signupadmin extends Controller
{
    function index()
    {
            $user = $this->loadModel("admin");
            $user->signup($_POST);

        $data['page_title'] = "Inscription";
        $this->view("connection/signupadmin", $data);
    }
}
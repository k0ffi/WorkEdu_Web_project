<?php

class Signup extends Controller
{
    function index()
    {
            $user = $this->loadModel("user");
            $user->signup($_POST);

        $data['page_title'] = "Inscription";
        $this->view("signup", $data);
    }
}


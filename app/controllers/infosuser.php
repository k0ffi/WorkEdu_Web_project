<?php

class Infosuser extends Controller
{
    function index()
    {
        $data['page_title'] = "Vos informations";
        $this->view("infosuser", $data);
    }
}   
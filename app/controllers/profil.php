<?php

class Profil extends Controller {
    function index() {
        $data['page_title'] = "Mon pofil";
        $this->view("profil", $data);
    }
}
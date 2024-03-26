<?php

class QCM extends Controller
{
    function index()
    {
        $data['page_title'] = "QCM";
        $this->view("qcm", $data);
    }
}
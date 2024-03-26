<?php

class Do_qcm extends Controller
{
    function index()
    {
        $data['page_title'] = "Faire Les QCM";

        $modelQCM  =  $this->loadModel("modelQCM") ; 
        //$QCM  =$modelQCM->recupererQCM("/Applications/XAMPP/xamppfiles/htdocs/projetWEB/app/models/xml") ;
        //require "/Applications/XAMPP/xamppfiles/htdocs/projet_WEB/app/views/do_qcm.php" ; 
        $this->view("do_qcm", $data);
    }
}
<?php

class Do_qcm extends Controller
{
    function index()
    {   $qcm = array() ; 
        $data['page_title'] = "Faire Les QCM";  
        $cour="informatique" ; 
        $data['cour'] = $cour ; 
        $modelQCM  =  $this->loadModel("modelQCM") ; 
        $QCM  =$modelQCM->recupererQCM($cour , "/Applications/XAMPP/xamppfiles/htdocs/projetWEB/app/models/xml") ;
        foreach($QCM as $element)
        {   $qcm['question'] = $element['question'] ; 
            $qcm['reponse'] = $element['reponse'] ;
            $qcm['propositions'] = $element['propositions'] ; 
            $data[] = $qcm  ; 
        }
        //show($data) ; 
        $this->view("do_qcm", $data);
    }
}
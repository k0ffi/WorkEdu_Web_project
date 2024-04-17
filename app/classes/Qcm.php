<?php

class Qcm {

    private $question; 
    private $reponse="" ; 
    private $propositions =array(); 

    public function __construct($question="" , $rep ="" ,$props)
    {


        $this-setQuestion($question);   
        $this->setReponse($rep);    
        $this->setPropositions($props);    
        
    }

    //  accesseurs

    public function setQuestion($question )
    {
        $this->question= $question;
    }

    public function setReponse($rep)
    
    {
            $this->reponse =$rep;
    }
    public function setPropositions($props)
    {
        foreach( $props as $proposition)
        {
            $this->propositions[]= $proposition ; 
        }
    }

    public function getQuestion($question )
    {return $this->question;
    }

    public function getReponse()
    
    {
        return $this->$reponse ;
    }
    public function getPropositions()
    {
        return $this->propositions ; 
    }

    




}



?>
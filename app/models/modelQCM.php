<?php

class ModelQCM {
 



    
public  function recupererQCM($cour,$cheminFichier) {
            $questions = array();
        
            // Vérifier si le fichier existe
            if (file_exists($cheminFichier)) {
                $xml_content = simplexml_load_file($cheminFichier. '/' . $cour . '.xml');
        
                // Parcourir chaque élément "qcm" dans le document XML
                foreach ($xml_content->qcm as $qcm) {
                    $question = (string)$qcm->question;
                    $reponse = (string)$qcm->reponse;
                    $propositions = array();
        
                    // Ajouter chaque proposition à la liste des propositions
                    $propositions[1] = (string)$qcm->proposition1;
                    $propositions[2] = (string)$qcm->proposition2;
                    $propositions[3] = (string)$qcm->proposition3;
        
                    // Ajouter la question avec ses propositions et sa réponse à la liste des questions
                    $questions[] = array(
                        'question' => $question,
                        'propositions' => $propositions,
                        'reponse' => $reponse
                    );
                }
            } else {
                $questions[] = array(
                    'question' => "Le fichier n'existe pas ",
                    'propositions' => '',
                    'reponse' => ''
                );
                // Gérer le cas où le fichier n'existe pas
                throw new Exception("Le fichier XML spécifié n'existe pas.");
                return $questions;
            }
        
            return $questions;
        }




    public function AjouterQCM($QCM , $cheminFichier) {
        $question ="" ;
        $reponse = "" ; 
        $question =  $QCM['question'] ; 
        $reponse  =  $QCM['reponse'] ; 
        $propositions = array() ; 

        
        for ($i = 1; $i <= 3; $i++) {
            $proposition[$i] = $QCM["proposition$i"];
        }
        $fichierXML = $cheminFichier . '/' . $QCM['cour'] . '.xml';



       
        // Création de l'objet XML
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->formatOutput = true;
    
        // Vérifier si le fichier XML existe déjà
        if (file_exists($cheminFichier.'/'.$QCM['cour'].'.xml')) {
            // Charger le fichier XML existant
            $xml->load($cheminFichier.'/'.$QCM['cour'].'.xml');
            // Obtenir la racine du document
            $racine = $xml->documentElement;
        } else {
            // Créer la racine si le fichier n'existe pas encore
            $xml->load($fichierXML);
            $racine = $xml->documentElement;
           
        }
    
        // Créer un élément <qcm>
        $qcm = $xml->createElement('qcm',);
        $qcm->appendChild($xml->createTextNode("\n\t"));
    
        // Créer un élément <question> et ajouter le texte
        $questionElement = $xml->createElement('question',$question);
        $qcm->appendChild($questionElement);
        $qcm->appendChild($xml->createTextNode("\n\t"));
    
        // Créer un élément <reponse> et ajouter le texte
        $reponseElement = $xml->createElement('reponse',$reponse);
        $qcm->appendChild($reponseElement);
        $qcm->appendChild($xml->createTextNode("\n\t"));
    
        // Ajouter les éléments <propositionX>
        for ($i = 1; $i <= 3; $i++) {
            $propositionElement = $xml->createElement("proposition$i",$proposition[$i]);
            $qcm->appendChild($propositionElement);
            $qcm->appendChild($xml->createTextNode("\n\t"));
        }
    
        // Ajouter l'élément <qcm> à la racine
    
        
        $racine->appendChild($qcm);
        
    
        // Enregistrer le document XML dans un fichier
        $xml->save($cheminFichier.'/'.$QCM['cour'].'.xml');
    }
    
    

       
}



?>

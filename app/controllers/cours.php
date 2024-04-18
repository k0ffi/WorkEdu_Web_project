<?php
class Cours extends Controller {
    function index() {
        $data['page_title'] = "Mes cours";

        // Charger le modèle Cours
        $coursModel = $this->loadModel('modelCours');

        // Vérifier si le chargement du modèle a réussi
        if ($coursModel) {
            // Récupérer l'ID de la filière de l'étudiant depuis la session
            $filiere_id_etudiant = $_SESSION['filiere_id'];

            // Appeler la méthode du modèle pour obtenir les cours par filière
            $cours = $coursModel->getCoursByFiliere($filiere_id_etudiant);

            // Ajouter les données des cours à transmettre à la vue
            $data['cours'] = $cours;

            // Charger la vue et transmettre les données
            $this->view("cours", $data);
        } else {
            // Gérer l'erreur de chargement du modèle
            die("Erreur : Impossible de charger le modèle Cours.");
        }
    }
}

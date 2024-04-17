<?php

class Forum extends Controller {
    function index() {
        if (!isset($_SESSION['username'])) {
            $data['page_title'] = "Redirection";
            $this->view("connection/redirection", $data);
            die;
        } else {
            $data['page_title'] = "Forum";

            // Charger le modèle ModelForum
            $forumModel = $this->loadModel("modelForum");

            if (!$forumModel) {
                die("Erreur lors du chargement du modèle ModelForum.");
            }

            // Traiter la soumission du formulaire de nouvelle discussion ou de réponse
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Vérifier s'il y a un champ parent_id pour déterminer s'il s'agit d'une réponse
                if (isset($_POST['parent_id'])) {
                    // Soumission d'une réponse à une discussion existante
                    $replyData = [
                        'content' => $_POST['content'],
                        'parent_id' => $_POST['parent_id']
                    ];

                    // Appeler la méthode postReply du modèle pour insérer la réponse
                    $success = $forumModel->postReply($replyData);

                    if ($success) {
                        $_SESSION['success'] = "Votre réponse a bien été postée.";
                    } else {
                        $_SESSION['error'] = "Erreur lors de l'enregistrement de votre réponse.";
                    }
                } else {
                    // Soumission d'une nouvelle discussion
                    $discussionData = [
                        'content' => $_POST['content']
                    ];

                    // Appeler la méthode postDiscussion du modèle pour insérer la nouvelle discussion
                    $success = $forumModel->postDiscussion($discussionData);

                    if ($success) {
                        $_SESSION['success'] = "Votre question a bien été postée.";
                    } else {
                        $_SESSION['error'] = "Erreur lors de l'enregistrement de votre question.";
                    }
                }
            }

            // Charger les discussions depuis le modèle
            $data['discussions'] = $forumModel->getDiscussions();

            // Afficher la vue du forum avec les données
            $this->view("forum/forum", $data);
        }
    }
}
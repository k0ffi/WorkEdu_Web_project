<?php

class Profil extends Controller {
    public function index() {
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $userModel = $this->loadModel('modelUser');
            $user = $userModel->getUserById($user_id);

            if ($user) {
                $data['user'] = $user;
                $data['page_title'] = 'Mon Profil';
                $this->view('profil', $data);
            } else {
                // Utilisateur non trouvé dans la base de données
                echo "Utilisateur introuvable.";
            }
        } else {
            // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
            header("Location: " . ROOT . "login");
            exit();
        }
    }
}

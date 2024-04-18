<?php

class ModelUser 
{
    function login($data) {
        $database = new Database();
    
        $_SESSION['error'] = '';
        // show($data);
    
        if (isset($data['username'], $data['password'])) {
            $tab['username'] = $data['username'];
            $tab['password'] = $data['password'];
    
            $query = "SELECT * FROM users WHERE username = :username && password = :password LIMIT 1";
    
            $resultat = $database->read($query, $tab);
    
            if (!empty($resultat)) {
                // Il y a au moins un enregistrement trouvé
                $_SESSION['user_id'] = $resultat[0]->id;
                $_SESSION['lastname'] = $resultat[0]->lastname;                
                $_SESSION['firstname'] = $resultat[0]->firstname;                
                $_SESSION['mail'] = $resultat[0]->mail;                
                $_SESSION['username'] = $resultat[0]->username;
                $_SESSION['filiere_id'] = $resultat[0]->filiere_id;

   
                // Redirection vers la page d'accueil après connexion réussie
                header('Location: ' . ROOT . 'home');
                exit;
            } else {
                $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            $_SESSION['error'] = "Veuillez remplir les champs obligatoires.";
        }
    }
    
    public function signup($data) {
        $_SESSION['error'] = '';
    
        // Vérifier les données requises
        $requiredFields = ['name', 'firstname', 'mail', 'password', 'filiere'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $_SESSION['error'] = "Veuillez remplir tous les champs.";
                return;
            }
        }
    
        // Valider l'adresse e-mail
        if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Adresse e-mail invalide.";
            return;
        }
    
        $database = new Database();
    
        // Vérifier si l'utilisateur existe déjà
        $query = "SELECT COUNT(*) AS cptUsers FROM users WHERE mail = :mail";
        $params = [':mail' => $data['mail']];
        $result = $database->read($query, $params);
    
        if ($result && $result[0]->cptUsers > 0) {
            $_SESSION['error'] = "L'utilisateur avec cette adresse e-mail existe déjà.";
            return;
        }
    
        // Générer un nom d'utilisateur unique
        $initials = substr($data['name'], 0, 1) . substr($data['firstname'], 0, 1);
        $randomNumbers = "";
        for ($i = 0; $i < 6; $i++) {
            $randomNumbers .= mt_rand(0, 9);
        }
        $username = $initials . $randomNumbers;
    
        // Insérer l'utilisateur dans la base de données
        $insertQuery = "INSERT INTO users (username, password, mail, lastname, firstname, filiere_id) VALUES (:username, :password, :mail, :lastname, :firstname, :filiere)";
        $insertParams = [
            ':username' => $username,
            // ':password' => $hashedPassword,
            ':password' => $data['password'],
            ':mail' => $data['mail'],
            ':lastname' => $data['name'],     
            ':firstname' => $data['firstname'],
            ':filiere' => $data['filiere']
        ];
    
        $success = $database->write($insertQuery, $insertParams);
    
        if ($success) {
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['lastname'] = $data['name'];
            $_SESSION['firstname'] = $data['firstname'];                
            $_SESSION['mail'] = $data['mail'];                
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $data['password'];
            $_SESSION['filiere_id'] = $data['filiere'];
            // Redirection après inscription réussie
            header("Location: " . ROOT . "infosuser");
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de l'enregistrement de l'utilisateur.";
        }
    }
    
    public function getAllFilieres() {
        $database = new Database();
        $query = "SELECT id, nom FROM filiere";
        $result = $database->read($query);
    
        $filieres = [];
        if ($result) {
            foreach ($result as $filiere) {
                $filieres[] = ['id' => $filiere->id, 'nom' => $filiere->nom];
            }
        }
        return $filieres;
    }
    
    
    function check_logged_in() {
        $DB = new Database();
        if (isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];
            
            $query = "SELECT * FROM users WHERE url = :user_url LIMIT 1";
            
            $data = $DB->read($query, $arr);
        
            if (is_array($data)){
                // connecté
                $_SESSION['user_id'] = $data[0]->username;
                $_SESSION['user_name'] = $data[0]->firstname;
                $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }
        return false;
    }

    public function getUserById($user_id) {
        $database = new Database();
        $query = "SELECT u.*, f.nom AS filiere_nom FROM users u
                  LEFT JOIN filiere f ON u.filiere_id = f.id
                  WHERE u.id = :user_id";
        $params = [':user_id' => $user_id];
        $result = $database->read($query, $params);

        if ($result && count($result) > 0) {
            return $result[0]; // Retourne le premier utilisateur trouvé
        } else {
            return null; // Aucun utilisateur trouvé
        }
    }
}
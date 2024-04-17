<?php

class Admin 
{

    public function signup($data)
    {
        $_SESSION['error'] = "";
    
        if(isset($data['name'], $data['firstname'], $data['mail'], $data['password'])) {
            $name = $data['name'];
            $fname = $data['firstname'];
            $mail = $data['mail'];
            $pass = $data['password'];
            
            try {
                // Connexion BD
                $pdo = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                // Vérification si l'utilisateur existe déjà
                $query = "SELECT COUNT(*) AS num_users FROM admins WHERE mail = :mail";
                $statement = $pdo->prepare($query);
                $statement->execute(['mail' => $mail]);
                $result = $statement->fetch(PDO::FETCH_OBJ);
        
                if ($result->num_users > 0) {
                    $_SESSION['error'] = "L'utilisateur avec cette adresse e-mail existe déjà.";
                    return; // Sortie de la fonction si l'utilisateur existe déjà
                }
                
                // Création du nom d'utilisateur
                $initials = substr($name, 0, 1) . substr($fname, 0, 1);
    
                $random_numbers = "";
                for ($i = 0; $i < 6; $i++) {
                    $random_numbers .= mt_rand(0, 9);
                }
    
                $username = $initials . $random_numbers;
    
                // Insertion de l'utilisateur dans la base de données
                $query = "INSERT INTO admins (lastname, firstname, mail, username, password, registration_date) 
                          VALUES (:lastname, :firstname, :mail, :username, :password, NOW())";
                $statement = $pdo->prepare($query);
                $success = $statement->execute([
                    'lastname' => $name,
                    'firstname' => $fname,
                    'mail' => $mail,
                    'username' => $username,
                    'password' => $pass
                ]);
    
                if ($success) {
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $fname;
                    $_SESSION['name'] = $name;
                    $_SESSION['mail'] = $mail;
                    $_SESSION['password'] = $pass;
                    header("Location:" . ROOT . "infosuser");
                    exit; // Sortie après l'insertion réussie
                } else {
                    $_SESSION['error'] = "Une erreur est survenue lors de l'inscription.";
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur : " . $e->getMessage();
            }
        }
    }
    



    public function login($data)
    {
        $_SESSION['error'] = "";
        if(isset($data['username'], $data['password'])) {
            $uname = $data['username'];
            $pass = $data['password'];
        
            try {
                $pdo = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $query = "SELECT * FROM admins WHERE username = :username AND password = :password";
                $statement = $pdo->prepare($query);
                $statement->execute(['username' => $uname, 'password' => $pass]);
                $user = $statement->fetch(PDO::FETCH_OBJ);  
        
                if ($user && $pass === $user->password) {
                   // echo "Connexion réussie pour l'utilisateur : " . $user['username'];
                    header("Location:" . ROOT ."profil");
                    $_SESSION['username'] = $user->username;
                    $_SESSION['name'] = $user->lastname;  
                    $_SESSION['firstname'] = $user->firstname;
                    $_SESSION['mail'] = $user->email;  
                    $_SESSION['password'] = $user->password;
                    $_SESSION['date'] = $user->registation_date;
                    exit;
                } else {
                    // echo "<p>" . "Nom d'utilisateur ou mot de passe incorrect." . "</p>";
                    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }

    function check_logged_in()
    {
        $DB = new Database();
        if (isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];
            
            $query = "SELECT * FROM admins WHERE url = :user_url LIMIT 1";
            
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
}
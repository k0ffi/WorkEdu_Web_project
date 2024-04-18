<?php

class Admin 
{
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
                    header("Location:" . ROOT ."admin");
                    $_SESSION['usernameA'] = $user->username;
                    $_SESSION['name'] = $user->lastname;  
                    $_SESSION['firstname'] = $user->firstname;
                    $_SESSION['mail'] = $user->email;  
                    $_SESSION['passwordA'] = $user->password;
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
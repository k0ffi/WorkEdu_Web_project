    <?php
    class ModelForum {
        function getDiscussions() {
        $database = new Database();
        $query = "SELECT * FROM forum WHERE parent_id IS NULL ORDER BY created_at DESC";
        $resultat = $database->read($query);
    
        if (empty($resultat)) {
            $_SESSION['msg'] = "Pas de question posée pour l'instant";
            return []; // Retourne un tableau vide s'il n'y a pas de discussions
        } else {
            $_SESSION['msg'] = '';
            $discussions = [];
    
            foreach ($resultat as $discussion) {
                $discussionItem = [
                    'id' => $discussion->id,
                    'username' => $discussion->username,
                    'created_at' => $discussion->created_at,
                    'content' => $discussion->content,
                    'replies' => [] // Tableau pour stocker les réponses à cette discussion
                ];
    
                // Récupérer les réponses associées à cette discussion
                $repliesQuery = "SELECT * FROM forum WHERE parent_id = :parent_id ORDER BY created_at";
                $repliesParams = [':parent_id' => $discussion->id];
                $repliesResult = $database->read($repliesQuery, $repliesParams);
    
                foreach ($repliesResult as $reply) {
                    $replyItem = [
                        'id' => $reply->id,
                        'username' => $reply->username,
                        'created_at' => $reply->created_at,
                        'content' => $reply->content
                    ];
    
                    // Ajouter la réponse à la liste des réponses de cette discussion
                    $discussionItem['replies'][] = $replyItem;
                }
    
                // Ajouter la discussion avec ses réponses au tableau des discussions
                $discussions[] = $discussionItem;
            }
    
            return $discussions;
        }
    }
    

        function postDiscussion($data) {
            $database = new Database();

            $_SESSION['error'] = '';

            if (isset($data['content']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_SESSION['username'];
                $content = $data['content'];
                $parent_id = null; // Parent_id pour une nouvelle discussion (peut être NULL)

                $query = "INSERT INTO forum (username, content, parent_id, created_at) VALUES (:username, :content, :parent_id, NOW())";
                
                $insertParams = [
                    ':username' => $username,
                    ':content' => $content,
                    ':parent_id' => $parent_id,
                ];

                $success = $database->write($query, $insertParams);
                
                if ($success) {
                    $_SESSION['success'] = "Votre question a bien été postée.";
                    return true;
                } else {
                    $_SESSION['error'] = "Erreur lors de l'enregistrement de votre question.";
                    return false;
                }

            } else {
                $_SESSION['error'] = "Veuillez remplir tous les champs.";
                return false;
            }
        }

        function postReply($data) {
            $database = new Database();

            $_SESSION['error'] = '';

            if (isset($data['content']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_SESSION['username'];
                $content = $data['content'];
                $parent_id = $data['parent_id'];

                $query = "INSERT INTO forum (username, content, parent_id, created_at) VALUES (:username, :content, :parent_id, NOW())";

                $insertParams = [
                    ':username' => $username,
                    ':content' => $content,
                    ':parent_id' => $parent_id,
                ];

                $success = $database->write($query, $insertParams);

                if ($success) {
                    $_SESSION['success'] = "Votre réponse a bien été postée.";
                    return true;
                } else {
                    $_SESSION['error'] = "Erreur lors de l'enregistrement de votre réponse.";
                    return false;
                }

            } else {
                $_SESSION['error'] = "Veuillez remplir tous les champs.";
                return false;
            }
        }
    }

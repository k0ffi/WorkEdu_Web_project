<?php

class Forum extends Controller {
    function index() {
        if (!(isset($_SESSION['username']))) {
            $data['page_title'] = "Redirection";
            $this->view("connection/redirection", $data);
            die;
        } else {
            $data['page_title'] = "Forum";
            $this->view("forum/forum", $data);
        }
    }
}

?>

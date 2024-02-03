<?php

    include_once('../Controllers/userController.php');

    if(isset($_POST['isbool']) == true){
        $data = [
            'firstname' => $_POST['fname'],
            'lastname' => $_POST['lname'],
            'course' => $_POST['course']
        ];

        $callback = new UserController();
        $callback->postData($data);
    }
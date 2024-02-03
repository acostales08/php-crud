<?php

    include_once('../Controllers/userController.php');

    if(isset($_GET['trigger']) == true){
        $callback = new UserController;
        $callback->fecthData();
    }
<?php

    include_once('../Database/database.php');
    include_once('../Queries/Queries.php');

    interface IPost{
        
        public function postData($data);
        public function fecthData();
    }

    class UserController extends Database implements IPost{
        public function postData($data)
        {
            $queryBuilder = new QueryBuilders;

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($this->php_prepare($queryBuilder->postQuery("post/insert"))){
                    $this->php_dynamic_handler(":fname", $data['firstname']);
                    $this->php_dynamic_handler(":lname", $data['lastname']);
                    $this->php_dynamic_handler(":course", $data['course']);
                    if ($this->php_execute()) {
                        $response = array(
                            "status" => "success"
                        );
                        echo json_encode($response);
                    } else {
                        $response = array(
                            "status" => "error",
                            "message" => "Failed to execute query."
                            );
                        echo json_encode($response);
                    }
                }
            }
        }

        public function fecthData(){
            $queryBuilder = new QueryBuilders;
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                if($this->php_prepare($queryBuilder->fetchQuery("fetch/get"))){
                    $this->php_execute();
                    if($this->php_row_check()){
                        $row = $this->php_fetch();
                        echo json_encode($row);
                    }else{
                        $response = array(
                            "status" => "No record found"
                        );
                        echo json_encode($response);
                    }
                }                
            }

        }
    }
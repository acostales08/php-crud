<?php

    class DatabaseMutation {
        static $host = "localhost";
        static $username = "root";
        static $password = "";
        static $database = "sampledb";
        static $helper;
        static $statement;
    }

    class Database {
        public function connect(){
            try{
                $connectionString = "mysql:host=". DatabaseMutation::$host. ";dbname=". DatabaseMutation::$database;
                DatabaseMutation::$helper = new PDO($connectionString, DatabaseMutation::$username, DatabaseMutation::$password);
                DatabaseMutation::$helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return DatabaseMutation::$helper;                
            } catch (PDOException $error) {
                die('Could not connect to the database' . $error->getMessage());
            }


        }

        public function php_prepare($sql){
            return DatabaseMutation::$statement = $this->connect()->prepare($sql);
        }

        public function php_dynamic_handler($values, $params, $types  = null){
            if(is_null($types)){
                switch($types){
                    case 1 :
                        $types = PDO::PARAM_INT;
                        break;
                    case 2 :
                        $types = PDO::PARAM_BOOL;
                        break;
                    default :
                        $types = PDO::PARAM_STR;
                }
            }
            return DatabaseMutation::$statement->bindParam($values, $params, $types);
        }

        public function php_execute(){
            return DatabaseMutation::$statement->execute();
        }

        public function php_row_check(){
            return DatabaseMutation::$statement->rowCount() > 0;
        }

        public function php_fetch(){
            return DatabaseMutation::$statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

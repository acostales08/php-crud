<?php

    class QueryBuilders {
        public function postQuery($condition){
            if($condition == "post/insert"){
                $sql = "insert into users values(default, :fname, :lname, :course, current_timestamp)";
                return $sql;
            }
        }

        public function fetchQuery($condition){
            if($condition == "fetch/get"){
                $sql = "select * from users";
                return $sql;
            }
        }
    }
<?php
    include 'database/MysqlController.php';

    class LoginController {

        private $mysqlController;

        function __construct(){
            $this->mysqlController = new MysqlController();
        }

        public function signin($username, $password){
            $response = array();
            $response["success"] = false;

            if(!empty($username) && !empty($password)){
                $query = sprintf("SELECT * FROM test_user WHERE username = '%s'", $username);
                $results = $this->mysqlController->executeQuery($query);

                if($results["success"]){
                    if(count($results["results"]) >= 1){
                        if(password_verify($password, $results["results"][0]["password"])){
                            $response["name"] = $results["results"][0]["name"];
                            $response["success"] = true;
                        }
                    }
                }
            }

            return $response;
        }

        public function signup($username, $password, $name){
            $response = array();
            $response["success"] = false;

            if(!empty($username) && !empty($password) && !empty($name)){
                $query = sprintf("INSERT INTO test_user VALUES ('%s', '%s', '%s')", $username, password_hash($password, PASSWORD_BCRYPT), $name);
                $results = $this->mysqlController->executeQuery($query);

                if($results["success"]){
                    $response["success"] = true;
                }
            }

            return $response;
        }
    }
?>
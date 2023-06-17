<?php
    class Account {

        private $errorArray;

        public function __construct() {
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $pass1, $pass2) {
            $this->validateUsername($un);
            $this->validateName($fn);
            $this->validateName($ln);
            $this->validateEmail($em);
            $this->validatePasswords($pass1, $pass2);

            if(empty($this->errorArray)){
                //Insert into DB
                return true;
            }
            else{
                return false;
            }

        }

        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function validateUsername($un){
            if(strlen($un) > 25 || strlen($un) < 5){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            //TODO: CHECK IF USERNAME EXISTS
        }
        
        private function validateName($name){
            if(strlen($name) > 25 || strlen($name) < 2){
                array_push($this->errorArray, Constants::$nameCharacters);
                return;
            }
        }
        

        private function validateEmail($em){
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            //TODO: Check that username hasn't already been used
        }
        
        private function validatePasswords($pass1, $pass2){
            if(strlen($pass1) > 30 || strlen($pass1) < 5){
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pass1)){
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if($pass1 != $pass2){
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }
        }




    }

?>
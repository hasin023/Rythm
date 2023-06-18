<?php
    class Account {

        private $errorArray;
        private $con;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

        public function login($un, $pass){
            $pass = md5($pass);

            $query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password = '$pass'");

            if(mysqli_num_rows($query) == 1){
                return true;
            }
            else{
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

        public function register($un, $fn, $ln, $em, $pass1, $pass2) {
            $this->validateUsername($un);
            $this->validateName($fn);
            $this->validateName($ln);
            $this->validateEmail($em);
            $this->validatePasswords($pass1, $pass2);

            if(empty($this->errorArray)){
                //Insert into DB
                return $this->insertUserDetails($un, $fn, $ln, $em, $pass1);
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

        private function insertUserDetails($un, $fn, $ln, $em, $pass1){
            $encryptedPw = md5($pass1); //Encrypts password
            $profilePic = "img/profile-pics/userIcon.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");

            return $result;

        }

        private function validateUsername($un){
            if(strlen($un) > 25 || strlen($un) < 5){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username = '$un'");
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
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

            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email = '$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
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
<?php
    class User{
        private $informations;

        public function getInformation(){
            $this->informations = array(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );
            return $this->informations;
        }
        public function validInformation(){
            $this->informations = $this->getInformation();
            $counter = 0;
            foreach($this->informations as $information){
                if(isset($information) && $information != ""){
                    $counter++;
                }else{
                    $counter--;
                }
            }
            if(count($this->informations) == $counter){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function getEmail(){
            return $_POST['email'];
        }
        public function getPassword(){
            return $_POST['password'];
        }

        public function haveAccount($email,$conn){
            $req = mysqli_query($conn,"SELECT * FROM User WHERE email = '$email'");
            $num_row = mysqli_num_rows($req);
            if($num_row >= 1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function validPassword($email,$password,$conn){
            $req = mysqli_query($conn,"SELECT password FROM User WHERE email = '$email'");
            while($row = mysqli_fetch_assoc($req)){
                if($row['password'] == $password){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
        }
        public function printInfo(){
            if($this->validInformation()){
                echo '<pre>';
                print_r($this->getInformation());
                echo '</pre>';
            }else{
                echo 'Veuillez remplir tout les champs';
            }
        }
    }
?>
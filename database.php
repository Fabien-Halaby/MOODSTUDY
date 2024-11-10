<?php
    class Database{
        private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $dbname = "MOODSTUDY";
        private $table = 'User';
        public $conn;

        public function connect(){
            try{
                $conn = mysqli_connect($this->server,$this->user,$this->password,$this->dbname);
                if(!$conn){
                    throw new Exception("Erreur de connexion à la base de données");
                }
            }catch(Exception $error){
                echo "Erreur : " . $error->getMessage();
            }
            return $conn;
        }

        public function insert($users){
            list(
                $name,
                $email,
                $password
            ) = $users;
            $sql = "INSERT INTO $this->table " . 
                    "VALUES(NULL,'$name','$email','$password')";
            try{
                $retval = mysqli_query($this->conn,$sql);
                if(!$retval){
                    throw new Exception("Erreur de l'enregistrement des données.");
                }
            }catch(Exception $error){
                echo "Erreur : " . $error->getMessage();
            }
        }
    }
?>
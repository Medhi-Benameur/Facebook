<?php
    require_once '../Libraries/Database.php';

    class User {

        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function findUserByEmailOrPhone($emailorphone){
            
            $this->db->query('SELECT * FROM users WHERE usersEmailOrPhone = :emailorphone');
            $this->db->bind(':emailorphone', $emailorphone);
            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function register($data){

            $this->db->query('INSERT INTO users (usersFname,usersLname, usersEmailOrPhone, usersGender, usersBirth, usersPwd ) 
            VALUES (:usersFname, :usersLname, :usersEmailOrPhone, :usersGender, :usersBirth, :usersPwd )');
    
            $this->db->bind(':usersFname', $data['usersFname']);
            $this->db->bind(':usersLname', $data['usersLname']);
            $this->db->bind(':usersEmailOrPhone', $data['usersEmailOrPhone']);
            $this->db->bind(':usersGender', $data['usersGender']);
            $this->db->bind(':usersBirth', $data['usersBirth']);
            $this->db->bind(':usersPwd', $data['usersPwd']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function login($emailOrPhone, $password){

            $row = $this->findUserByEmailOrPhone($emailOrPhone);
            if(password_verify($password, $row->userspwd)){
                return $row;
            }else{
                return false;
            }
        }
    } 
?>
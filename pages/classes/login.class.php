<?php
    require_once ('crud.class.php');      

    class Login extends Crud{
        private $username;
        private $email;
        private $password;
        private $registrationdate;

        public function __construct($pid, $pusername,$pemail,$ppassword,$pregistrationdate){
            parent::__construct($pid);
            $this->setUsername($pusername);
            $this->setEmail($pemail);
            $this->setPassword($ppassword);
            $this->setRegistrationDate($pregistrationdate);            
        }        

        public function inserir(){
            $sql = 'INSERT INTO user (id, username, email, password, registration_date) VALUES (:id, :username, :email, :password, :registration_date)';
            $params = array(':id'=>$this->getId(),
                            ':username'=>$this->getUsername(),
                            ':email'=>$this->getEmail(),
                            ':password'=>$this->getPassword(),
                            ':registration_date'=>$this->getRegistrationDate());
            
            return Database::executar($sql, $params);
        }

        public function excluir(){
            $sql = 'DELETE FROM user WHERE id = :id';         
            $params = array(':id'=>$this->getId());         
            return Database::executar($sql, $params);
        }

        public function editar(){
            $sql = 'UPDATE user SET username = :username, email  = :email, password  = :password, registration_date  = :registration_date WHERE   id = :id';
            $params = array(':id'=>$this->getId(),
                            ':username'=>$this->getUsername(),
                            ':email'=>$this->getEmail(),
                            ':password'=>$this->getPassword(),
                            ':registration_date'=>$this->getRegistrationDate());
            return Database::executar($sql, $params);            
        }
            
        public static function listar($tipo = 0, $info = ''){
            $sql = 'SELECT * FROM user';
            switch($tipo){
                case 1: $sql .= ' WHERE id = :info'; break;
                case 2: $sql .= ' WHERE username like :info';  break;
                case 3: $sql .= ' WHERE email = :info';  break;
            }           
            $params = array();
            if ($tipo > 0)
                $params = array(':info'=>$info);         
            return Database::listar($sql, $params);
        }
        
        public function getUsername(){
            return $this->username;
        }
        public function setUsername($username){
            $this->username = $username;
        } 
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        } 
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        } 
        public function getRegistrationDate(){
            return $this->registrationdate;
        }
        public function setRegistrationDate($registrationdate){
            $this->registrationdate = $registrationdate;
        }      
    }
    
?>
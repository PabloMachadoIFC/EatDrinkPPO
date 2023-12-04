<?php
    require_once ('crud.class.php');      

    class Password extends Crud{
        private $start_date;
        private $expiry_date;
        private $token;
        private $user_id;

        public function __construct($pid, $pstart_date,$pexpiry_date,$ptoken,$puser_id){
            parent::__construct($pid);
            $this->setStart_date($pstart_date);
            $this->setExpiry_date($pexpiry_date);
            $this->setToken($ptoken);
            $this->setUser_id($puser_id);            
        }        

        public function inserir(){
            $sql = 'INSERT INTO password_recovery (id, start_date, expiry_date, token, user_id) VALUES (:id, :start_date, :expiry_date, :token, :user_id)';
            $params = array(':id'=>$this->getId(),
                            ':start_date'=>$this->getStart_date(),
                            ':expiry_date'=>$this->getExpiry_date(),
                            ':token'=>$this->getToken(),
                            ':user_id'=>$this->getUser_id());
            return Database::executar($sql, $params);   
        }

        public function excluir(){
            $sql = 'DELETE FROM password_recovery WHERE id = :id';         
            $params = array(':id'=>$this->getId());         
            return Database::executar($sql, $params);
        }

        public function editar(){
            $sql = 'UPDATE password_recovery SET start_date = :start_date, expiry_date  = :expiry_date, token  = :token, user_id  = :user_id WHERE id = :id';
            $params = array(':id'=>$this->getId(),
                            ':start_date'=>$this->getStart_date(),
                            ':expiry_date'=>$this->getExpiry_date(),
                            ':token'=>$this->getToken(),
                            ':user_id'=>$this->getUser_id());
            return Database::executar($sql, $params);            
        }        

        public static function resetPassword($user_id, $password){
            $sql = 'UPDATE user SET password = :password WHERE id = :id';
            $params = array(':id' => $user_id,
                            ':password' => $password);
            return Database::executar($sql, $params);            
        }                    
                    
        public static function listar($tipo = 0, $info = ''){
            $sql = 'SELECT * FROM user';
            switch($tipo){
                case 1: $sql .= ' WHERE id = :info'; break;
                case 2: $sql .= ' WHERE start_date like :info';  break;
                case 3: $sql .= ' WHERE email = :info';  break;
            }           
            $params = array();
            if ($tipo > 0)
                $params = array(':info'=>$info);         
            return Database::listar($sql, $params);
        }
        public static function getUserIdByEmail($email){
            $sql = 'SELECT id FROM user WHERE email = :email';
            $params = array(':email' => $email);
            $result = Database::listar($sql, $params);

            if (!empty($result)) {
                return $result[0]['id'];
            } else {
                return false; // Email não encontrado na tabela
            }
        }
        public static function checkExistingEmail($email){
            $sql = 'SELECT COUNT(*) AS total FROM user WHERE email = :email';
            $params = array(':email' => $email);
            
            $resultado = Database::listar($sql, $params);
            $total = $resultado[0]['total'];
            
            return $total > 0;
        }
        public function getStart_date(){
            return $this->start_date;
        }
        public function setStart_date($start_date){
            $this->start_date = $start_date;
        } 
        public function getExpiry_date(){
            return $this->expiry_date;
        }
        public function setExpiry_date($expiry_date){
            $this->expiry_date = $expiry_date;
        } 
        public function getToken(){
            return $this->token;
        }
        public function setToken($token){
            $this->token = $token;
        } 
        public function getUser_id(){
            return $this->user_id;
        }
        public function setUser_id($user_id){
            $this->user_id = $user_id;
        }      
    }
    
?>
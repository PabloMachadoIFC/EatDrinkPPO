<?php
    require_once ('crud.class.php');    

    class Establishment extends Crud{
        private $name;
        private $cnpj;
        private $zip_code;
        private $phone;
        private $address;
        private $culinary_style_id;
        private $owner_id;

        public function __construct($pid,$pname,$pcnpj,$pzip_code,$pphone,$paddress,$pculinary_style_id,$powner_id){
            parent::__construct($pid);
            $this->setName($pname);
            $this->setCnpj($pcnpj);
            $this->setZip_code($pzip_code);
            $this->setPhone($pphone);     
            $this->setAddress($paddress);
            $this->setCulinary_style_id($pculinary_style_id);    
            $this->setOwner_id($powner_id);     
        }        

        public function inserir(){
            $sql = 'INSERT INTO establishment (id, name, cnpj, zip_code, phone, address,culinary_style_id, owner_id) VALUES (:id, :name, :cnpj, :zip_code, :phone, :address, :culinary_style_id, :owner_id)';
            $params = array(
                ':id' => $this->getId(),
                ':name' => $this->getName(),
                ':cnpj' => $this->getCnpj(),
                ':zip_code' => $this->getZip_code(),
                ':phone' => $this->getPhone(),
                ':address' => $this->getAddress(),
                ':culinary_style_id' => $this->getCulinary_style_id(),
                ':owner_id' => $this->getOwner_id());                      
            return Database::executar($sql, $params);
        }

        public function excluir(){
            $sql = 'DELETE FROM establishment WHERE id = :id';         
            $params = array(':id'=>$this->getId());         
            return Database::executar($sql, $params);
        }

        public function editar(){
            $sql = 'UPDATE establishment SET name = :name, cnpj  = :cnpj, zip_code  = :zip_code, phone  = :phone, address  = :address, culinary_style_id  = :culinary_style_id, owner_id  = :owner_id  WHERE id = :id';
            $params = array(
                ':id' => $this->getId(),
                ':name' => $this->getName(),
                ':cnpj' => $this->getCnpj(),
                ':zip_code' => $this->getZip_code(),
                ':phone' => $this->getPhone(),
                ':address' => $this->getAddress(),
                ':culinary_style_id' => $this->getCulinary_style_id(),
                ':owner_id' => $this->getOwner_id()); 
            return Database::executar($sql, $params);            
        }
            
        public static function listar($tipo = 0, $info = ''){
            $sql = 'SELECT * FROM establishment';
            switch($tipo){
                case 1: $sql .= ' WHERE id = :info'; break;
                case 2: $sql .= ' WHERE name like :info';  break;
                case 3: $sql .= ' WHERE cnpj = :info';  break;
                case 4: $sql .= ' WHERE owner_id = :info';  break;
            }           
            $params = array();
            if ($tipo > 0)
                $params = array(':info'=>$info);         
            return Database::listar($sql, $params);
        }
        public static function listarTodos() {
            $sql = 'SELECT id, name FROM establishment';
            $params = array();
            return Database::listar($sql, $params);
        }
        
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        } 
        public function getCnpj(){
            return $this->cnpj;
        }
        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        } 
        public function getZip_code(){
            return $this->zip_code;
        }
        public function setZip_code($zip_code){
            $this->zip_code = $zip_code;
        } 
        public function getPhone(){
            return $this->phone;
        }
        public function setPhone($phone){
            $this->phone = $phone;
        }            
        public function getAddress(){
            return $this->address;
        }
        public function setAddress($address){
            $this->address = $address;
        } 
        public function getCulinary_style_id(){
            return $this->culinary_style_id;
        }
        public function setCulinary_style_id($culinary_style_id){
            $this->culinary_style_id = $culinary_style_id;
        } 
        public function getOwner_id(){
            return $this->owner_id;
        }
        public function setOwner_id($owner_id){
            $this->owner_id = $owner_id;
        } 
    }
    
?>
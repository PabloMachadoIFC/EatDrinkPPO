<?php
    require_once ('crud.class.php');   
    class Styles extends Crud{
        private $name;

        public function __construct($pid, $pname){
            parent::__construct($pid);
            $this->setName($pname);;            
        }        

        public function inserir(){
            $sql = 'INSERT INTO culinarystyles (id, name) VALUES (:id, :name)';
            $params = array(':id'=>$this->getId(),
                            ':name'=>$this->getname(),);
            
            return Database::executar($sql, $params);
        }

        public function excluir(){
            $sql = 'DELETE FROM user WHERE id = :id';         
            $params = array(':id'=>$this->getId());         
            return Database::executar($sql, $params);
        }

        public function editar(){
            $sql = 'UPDATE culinarystyles SET name = :name WHERE   id = :id';
            $params = array(':id'=>$this->getId(),
                            ':name'=>$this->getname());
            return Database::executar($sql, $params);
            
        }
    
        public static function listar($tipo = 0, $info = ''){
            $sql = 'SELECT * FROM culinarystyles';
            switch($tipo){
                case 1: $sql .= ' WHERE id = :info'; break;
                case 2: $sql .= ' WHERE name like :info';  break;
            }           
            $params = array();
            if ($tipo > 0)
                $params = array(':info'=>$info);         
            return Database::listar($sql, $params);
        }

        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }   
    }
    
?>
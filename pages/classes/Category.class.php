<?php
    require_once ('crud.class.php');   
    class Category extends Crud {
        private $name;
        private $establishmentId;

        public function __construct($pid, $pname, $pestablishmentId) {
            parent::__construct($pid);
            $this->setName($pname);
            $this->setEstablishmentId($pestablishmentId);
        }

        public function inserir() {
            $sql = 'INSERT INTO category (id, name, establishment_id) VALUES (:id, :name, :establishmentId)';
            $params = array(
                ':id' => $this->getId(),
                ':name' => $this->getName(),
                ':establishmentId' => $this->getEstablishmentId()
            );

            return Database::executar($sql, $params);
        }

        public function excluir() {
            $sql = 'DELETE FROM category WHERE id = :id';
            $params = array(':id' => $this->getId());

            return Database::executar($sql, $params);
        }

        public function editar() {
            $sql = 'UPDATE category SET name = :name, establishment_id = :establishmentId WHERE id = :id';
            $params = array(
                ':id' => $this->getId(),
                ':name' => $this->getName(),
                ':establishmentId' => $this->getEstablishmentId()
            );

            return Database::executar($sql, $params);
        }

        public static function listar($type = 0, $info = '') {
            $sql = 'SELECT * FROM category';
            switch ($type) {
                case 1: 
                    $sql .= ' WHERE id = :info'; 
                    break;
                case 2: 
                    $sql .= ' WHERE name LIKE :info'; 
                    break;
                case 3:
                    $sql .= ' WHERE establishment_id = :info';
            }
        
            $params = array();
            if ($type > 0) {
                $params = array(':info' => $info);
            }
        
            $results = Database::listar($sql, $params);
        
            // Se o tipo for 1 (busca por ID) e houver resultados, retorne um objeto Category
            if ($type == 1 && !empty($results)) {
                $result = $results[0]; // Pega o primeiro resultado
                return new Category($result['id'], $result['name'], $result['establishment_id']);
            }
        
            // Caso contrário, retorne o array de resultados (que pode ser vazio)
            $categories = array();
            foreach ($results as $result) {
                $category = new Category($result['id'], $result['name'], $result['establishment_id']);
                $categories[] = $category;
            }
            
            return $categories;
        }
            
        
        public static function hasProducts($categoryId) {
            $sql = 'SELECT COUNT(*) as count FROM product_category WHERE category_id = :category_id';
            $params = array(':category_id' => $categoryId);
    
            $result = Database::listar($sql, $params);
    
            return $result[0]['count'] > 0;
        }
        public static function hasOnlyOneCategory() {
            $sql = 'SELECT COUNT(*) as count FROM category';
            $params = array();
    
            $result = Database::listar($sql, $params);
    
            return $result[0]['count'] === 1;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getEstablishmentId() {
            return $this->establishmentId;
        }

        public function setEstablishmentId($establishmentId) {
            $this->establishmentId = $establishmentId;
        }
    }

?>
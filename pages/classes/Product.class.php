<?php
require_once('crud.class.php');

class Product extends Crud
{
    private $name;
    private $description;
    private $price;
    private $img;
    private $category_id;

    public function __construct($pid, $pname, $pdescription, $pprice, $pimg, $pcategory_id)
    {
        parent::__construct($pid);
        $this->setName($pname);
        $this->setDescription($pdescription);
        $this->setPrice($pprice);
        $this->setImg($pimg);
        $this->setCategoryId($pcategory_id);
    }

    public function inserir()
    {
        $sql = 'INSERT INTO product (id, name, description, price, img, category_id) VALUES (:id, :name, :description, :price, :img, :category_id)';
        $params = array(
            ':id' => $this->getId(),
            ':name' => $this->getName(),
            ':description' => $this->getDescription(),
            ':price' => $this->getPrice(),
            ':img' => $this->getImg(),
            ':category_id' => $this->getCategoryId()
        );
        return Database::executar($sql, $params);
    }
    
    public function editar()
    {
        $sql = 'UPDATE product SET name = :name, description = :description, price = :price, img = :img, category_id = :category_id WHERE id = :id';
        $params = array(
            ':id' => $this->getId(),
            ':name' => $this->getName(),
            ':description' => $this->getDescription(),
            ':price' => $this->getPrice(),
            ':img' => $this->getImg(),
            ':category_id' => $this->getCategoryId()
        );
        return Database::executar($sql, $params);
    }

    public static function listar($type = 0, $info = '')
    {
        $sql = 'SELECT * FROM product';
        switch ($type) {
            case 1:
                $sql .= ' WHERE id = :info';
                break;
            case 2:
                $sql .= ' WHERE name LIKE :info';
                break;
            case 3:
                $sql .= ' WHERE category_id = :info';
                break;
        }
        $params = array();
        if ($type > 0)
            $params = array(':info' => $info);
    
        $results = Database::listar($sql, $params);
    
        // Se o tipo for 1 (busca por ID) e houver resultados, retorne um objeto Product
        if ($type == 1 && !empty($results)) {
            $result = $results[0]; // Pega o primeiro resultado
            return new Product($result['id'], $result['name'], $result['description'], $result['price'], $result['img'], $result['category_id']);
        }
    
        $produtos = array();
            foreach ($results as $result) {
                $produto = new Product($result['id'], $result['name'], $result['description'], $result['price'], $result['img'], $result['category_id']);
                $produtos[] = $produto;
            }
        // Caso contrário, retorne o array de resultados (que pode ser vazio)
        return $produtos;
    }
    
    


    public function excluir()
    {
        $sql = 'DELETE FROM product WHERE id = :id';
        $params = array(':id' => $this->getId());
        return Database::executar($sql, $params);
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
}
?>

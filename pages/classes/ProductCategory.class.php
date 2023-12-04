<?php
require_once('crud.class.php');

class ProductCategory extends Crud
{
    private $product_id;
    private $category_id;

    public function __construct($product_id, $category_id)
    {
        $this->setProductId($product_id);
        $this->setCategoryId($category_id);
    }

    public function inserir()
    {
        $sql = 'INSERT INTO product_category (product_id, category_id) VALUES (:product_id, :category_id)';
        $params = array(
            ':product_id' => $this->getProductId(),
            ':category_id' => $this->getCategoryId()
        );
        return Database::executar($sql, $params);
    }

    public function excluir()
    {
        $sql = 'DELETE FROM product_category WHERE product_id = :product_id AND category_id = :category_id';
        $params = array(
            ':product_id' => $this->getProductId(),
            ':category_id' => $this->getCategoryId()
        );
        return Database::executar($sql, $params);
    }

    public static function listar($type = 0, $info = '')
    {
        $sql = 'SELECT * FROM product_category';
        switch ($type) {
            case 1:
                $sql .= ' WHERE produt_id = :info';
                break;
            case 2:
                $sql .= ' WHERE category_id LIKE :info';
                break;
            // Adicione outros casos conforme necessário
        }
        $params = array();
        if ($type > 0)
            $params = array(':info' => $info);
        return Database::listar($sql, $params);
    }
    public function editar(){}

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
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

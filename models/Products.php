<?php
class Products
{
    private $idproduct;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $discount;
    private $image;
    private $create_at;
    private $Category_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdproduct()
    {
        return $this->idproduct;
    }
    public function setIdproduct($idproduct)
    {
        $this->idproduct = $idproduct;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getCreate_at()
    {
        return $this->create_at;
    }
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
        return $this;
    }

    public function getCategory_id()
    {
        return $this->Category_id;
    }
    public function setCategory_id($Category_id)
    {
        $this->Category_id = $Category_id;
        return $this;
    }

    public function save()
    {
        $SQL = "INSERT INTO products VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getPrice()}', '{$this->getStock()}', '{$this->getDiscount()}', '{$this->getImage()}', '{$this->getCreate_at()}', '{$this->getCategory_id()}');";
        $PRODCUTS = $this->db->query($SQL);
        $Save = false;
        if ($PRODCUTS) {
            $Save = true;
        }
        return $Save;
    }
    public function all()
    {
        $PRODUCTS = $this->db->query("SELECT P.*, LEFT(P.description, 80) AS 'descriptionCor', C.name AS 'category' FROM products P INNER JOIN category C ON P.idproduct = C.idcategory ORDER BY idproduct");
        return $PRODUCTS;
    }
}

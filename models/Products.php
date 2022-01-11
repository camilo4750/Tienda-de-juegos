<?php
class Products
{
    private $idproduct;
    private $name;
    private $creator;
    private $description;
    private $format;
    private $language;
    private $voices;
    private $online;
    private $requirements;
    private $price_init;
    private $price;
    private $stock;
    private $discount;
    private $image;
    private $create_at;
    private $status;
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

    public function getCreator()
    {
        return $this->creator;
    }
    public function setCreator($creator)
    {
        $this->creator = $creator;
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

    public function getFormat()
    {
        return $this->format;
    }
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    public function getLanguage()
    {
        return $this->language;
    }
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    public function getVoices()
    {
        return $this->voices;
    }
    public function setLVoices($voices)
    {
        $this->voices = $voices;
        return $this;
    }

    public function getOnline()
    {
        return $this->online;
    }
    public function setLOnline($online)
    {
        $this->online = $online;
        return $this;
    }

    public function getRequirements()
    {
        return $this->requirements;
    }
    public function setLRequirements($requirements)
    {
        $this->requirements = $requirements;
        return $this;
    }

    public function getPrice_init()
    {
        return $this->price_init;
    }
    public function setLPrice_init($price_init)
    {
        $this->price_init = $price_init;
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

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
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
        $SQL = "INSERT INTO products VALUES(NULL, '{$this->getName()}', '{$this->getCreator()}', '{$this->getDescription()}', '{$this->getFormat()}', '{$this->getLanguage()}', '{$this->getVoices()}', '{$this->getOnline()}', '{$this->getRequirements()}', '{$this->getPrice_init()}', '{$this->getPrice()}', '{$this->getStock()}', '{$this->getDiscount()}', '{$this->getImage()}', '{$this->getCreate_at()}', '{$this->getStatus()}', '{$this->getCategory_id()}');";

        $PRODCUTS = $this->db->query($SQL);
        $Save = false;
        if ($PRODCUTS) {
            $Save = true;
        }
        return $Save;
    }

    public function all()
    {
        $PRODUCTS = $this->db->query("SELECT P.*, LEFT(P.description, 75) AS 'descriptionCor', C.name AS 'category' FROM products P INNER JOIN category C ON P.Category_id  = C.idcategory   ORDER BY rand() LIMIT 8");
        return $PRODUCTS;
    }

    public function allproducts()
    {
        $PRODUCTS = $this->db->query("SELECT P.*, LEFT(P.description, 75) AS 'descriptionCor', C.name AS 'category' FROM products P INNER JOIN category C ON P.Category_id  = C.idcategory ORDER BY rand()");
        return $PRODUCTS;
    }

    public function seeAll()
    {
        $PRODUCTS = $this->db->query("SELECT P.*, LEFT(P.description, 50) AS 'descriptionCor', C.name AS 'category' FROM products P INNER JOIN category C ON P.Category_id  = C.idcategory ORDER BY rand()");
        return $PRODUCTS;
    }

    public function oneProduct()
    {
        $PRODUCTS = $this->db->query("SELECT P.*, LEFT(P.description, 80) AS 'descriptionCor', C.name AS 'category', C.idcategory FROM products P INNER JOIN category C ON P.Category_id  = C.idcategory WHERE idproduct = '{$this->getIdproduct()}'");
        return $PRODUCTS->fetch_object();
    }

    public function editProduct()
    {
        $SQL = "UPDATE products SET name = '{$this->getName()}', creator = '{$this->getCreator()}', description = '{$this->getDescription()}', format = '{$this->getFormat()}', language = '{$this->getLanguage()}', voices = '{$this->getVoices()}', online = '{$this->getOnline()}', requirements = '{$this->getRequirements()}', price_init = '{$this->getPrice_init()}', price = '{$this->getPrice()}', stock = '{$this->getStock()}', discount = '{$this->getDiscount()}'  ";
        if ($this->getImage() != null) {
            $SQL .= ", image = '{$this->getImage()}'";
        }
        $SQL .= ", create_at = '{$this->getCreate_at()}', status = '{$this->getStatus()}', Category_id = '{$this->getCategory_id()}' WHERE idproduct = '{$this->getIdproduct()}'";
        $PRODCUTS = $this->db->query($SQL);
        $Edit = false;
        if ($PRODCUTS) {
            $Edit = true;
        }
        return $Edit;
    }

    public function changeStatus()
    {
        $SQL = "UPDATE products SET status = '{$this->getStatus()}' WHERE idproduct = '{$this->getIdproduct()}'";
        $status = $this->db->query($SQL);
        $edit = false;
        if ($status) {
            $edit = true;
        }
        return $edit;
    }

    public function countProducts()
    {
        $Products = $this->db->query("SELECT COUNT(*) AS 'total' FROM products");
        return  $Products->fetch_object();
    }


    public function totalPriceProducts()
    {
        $totalInit = $this->db->query("SELECT SUM(price_init * stock) AS 'total_product' FROM products");
        return  $totalInit->fetch_object();
    }

    public function totalPriceProductsClient()
    {
        $totalProduct = $this->db->query("SELECT SUM(price * stock) AS 'total_product_client' FROM products");
        return  $totalProduct->fetch_object();
    }

    public function allProductsForCategory()
    {
        $category = $this->db->query("SELECT P.*, LEFT(P.description, 80) AS 'descriptionCor', C.name AS 'category' FROM products P INNER JOIN category C ON P.Category_id  = C.idcategory WHERE Category_id = '{$this->getCategory_id()}'");
        return $category;
    }

    public function emptyStock()
    {
        $stocks = $this->db->query("SELECT P.*, LEFT(P.description, 75) AS 'descriptionCor', C.name AS 'category' FROM products P INNER JOIN category C ON P.Category_id  = C.idcategory WHERE stock = '0'");
        return  $stocks;
    }

    public function totalStock()
    {
        $totalStock = $this->db->query("SELECT COUNT(*) AS 'totalStock' FROM products WHERE stock = '0'");
        return $totalStock->fetch_object();
    }
}

<?php
class Orders
{
    private $idorder;
    private $name;
    private $document;
    private $city;
    private $direction;
    private $telephone;
    private $coste;
    private $create_at;
    private $status;
    private $guide_number;
    private $Clients_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdorder()
    {
        return $this->idorder;
    }
    public function setIdorder($idorder)
    {
        $this->idorder = $idorder;
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

    public function getDocument()
    {
        return $this->document;
    }
    public function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getDirection()
    {
        return $this->direction;
    }
    public function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getCoste()
    {
        return $this->coste;
    }
    public function setCoste($coste)
    {
        $this->coste = $coste;
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


    public function getGuide_number()
    {
        return $this->guide_number;
    }
    public function setGuide_number($guide_number)
    {
        $this->guide_number = $guide_number;
        return $this;
    }


    public function getClients_id()
    {
        return $this->Clients_id;
    }

    public function setClients_id($Clients_id)
    {
        $this->Clients_id = $Clients_id;
        return $this;
    }

    public function saveOrder()
    {
        $SQL = "INSERT INTO orders VALUES(NULL, '{$this->getName()}', '{$this->getDocument()}', '{$this->getCity()}', '{$this->getDirection()}', '{$this->getTelephone()}', '{$this->getCoste()}', CURDATE(), CURTIME(), '{$this->getStatus()}', 'NULL', '{$this->getClients_id()}');";
        $saveOrder = $this->db->query($SQL);
        $save = false;
        if ($saveOrder) {
            $save = true;
        }
        return $save;
    }

    public function saveLine_orders()
    {
        $SQL = "SELECT LAST_INSERT_ID() AS 'order';";
        $lastId = $this->db->query($SQL);
        $order_id = $lastId->fetch_object()->order;

        foreach ($_SESSION['cart'] as $indice => $element) {
            $product = $element['product'];
            $insert = "INSERT INTO line_orders VALUES(NULL, CURDATE(), CURTIME(), '{$order_id}', '{$product->idproduct}', '{$element['units']}');";
            $save = $this->db->query($insert);
        }
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function oneUserBuy()
    {
        $OneBuy = $this->db->query("SELECT idorder, coste, guide_number, status, create_ad, time FROM orders WHERE Clients_id = '{$this->getClients_id()}' ORDER BY idorder DESC LIMIT 1");
        return $OneBuy->fetch_object();
    }

    public function oneOrder()
    {
        $order = $this->db->query("SELECT idorder, coste, guide_number, status, create_ad, time FROM orders WHERE idorder = '{$this->getIdorder()}'");
        return $order->fetch_object();
    }

    public function productsOfOneOrder($id)
    {
        $products = $this->db->query("SELECT P.*, O.unidades, O.Orders_id FROM products P INNER JOIN line_orders O ON P.idproduct = O.Products_id WHERE Orders_id = {$id}");
        return $products;
    }

    public function ordersForClient()
    {
        $orders = $this->db->query("SELECT idorder, coste, create_ad, status FROM orders WHERE Clients_id = '{$this->getClients_id()}'");
        return $orders;
    }
}

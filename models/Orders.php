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
            $stocks = ($product->stock - $element['units']);
            $insert = "INSERT INTO line_orders VALUES(NULL, CURDATE(), CURTIME(), '{$order_id}', '{$product->idproduct}', '{$element['units']}');";
            $save = $this->db->query($insert);
            $updateStock = "UPDATE products set stock = '{$stocks}' WHERE idproduct = '{$product->idproduct}'";
            $update = $this->db->query($updateStock);
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

    public function ordersPending()
    {
        $orders = $this->db->query("SELECT idorder, coste, create_ad, time, city FROM orders WHERE status = 'Pendiente' ORDER BY idorder DESC LIMIT 7");
        return $orders;
    }

    public function countOrdersPending()
    {
        $pending = $this->db->query("SELECT COUNT(*) AS 'totalPending' FROM orders WHERE status = 'Pendiente' ORDER BY idorder DESC");
        return $pending->fetch_object();
    }

    public function countOrdersPreparation()
    {
        $Preparation = $this->db->query("SELECT COUNT(*) AS 'totalPreparation' FROM orders WHERE status = 'Preparacion' ORDER BY idorder DESC");
        return $Preparation->fetch_object();
    }


    public function countOrdersSend()
    {
        $Send = $this->db->query("SELECT COUNT(*) AS 'totalSend' FROM orders WHERE status = 'Enviado' ORDER BY idorder DESC");
        return $Send->fetch_object();
    }

    public function countOrdersDelivered()
    {
        $Delivered = $this->db->query("SELECT COUNT(*) AS 'totalDelivered' FROM orders WHERE status = 'Entregado' ORDER BY idorder DESC");
        return $Delivered->fetch_object();
    }

    public function countOrders()
    {
        $count = $this->db->query("SELECT COUNT(*) AS 'total' FROM orders WHERE Clients_id = '{$this->getClients_id()}'");
        return $count->fetch_object();
    }

    public function allOrders()
    {
        $orders = $this->db->query("SELECT idorder, coste, create_ad, time, status FROM orders ORDER BY idorder DESC");
        return $orders;
    }

    public function updateOrder()
    {
        $SQL = "UPDATE orders SET status = '{$this->getStatus()}' WHERE idorder = '{$this->getIdorder()}'";
        $updateOrder = $this->db->query($SQL);
        $update = false;
        if ($updateOrder) {
            $update = true;
        }
        return $update;
    }

    public function saveGuide()
    {
        $SQL = "UPDATE orders SET guide_number = '{$this->getGuide_number()}' WHERE idorder = '{$this->getIdorder()}'";
        $updateOrder = $this->db->query($SQL);
        $update = false;
        if ($updateOrder) {
            $update = true;
        }
        return $update;
    }

    public function ValueOrders()
    {
        $value = $this->db->query("SELECT SUM(coste) AS 'totalOrders' FROM orders;");
        return $value->fetch_object();
    }


}

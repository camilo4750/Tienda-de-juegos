<?php
require_once('models/Products.php');
require_once('models/Orders.php');
class CartController
{
    public function listProducts()
    {
        if (isset($_SESSION['cart']) == null) {
            $cart = $_SESSION['cart'] = [];
        } else {
            $cart = $_SESSION['cart'];
        }

        require_once('view/Card/seeCart.php');
    }

    public function addToCart()
    {
        if (isset($_GET['id'])) {
            $idProduct = $_GET['id'];
        } else {
            header("Location:" . baseUrl . "Products/index");
        }

        if (isset($_SESSION['cart'])) {
            $counter = 0;
            foreach ($_SESSION['cart'] as $indice => $elemento) {
                if ($elemento['id'] == $idProduct) {
                    $_SESSION['cart'][$indice]['units']++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            $Product = new Products();
            $Product->setIdproduct($idProduct);
            $see = $Product->oneProduct();


            if (is_object($Product)) {
                $_SESSION['cart'][] = array(
                    "id" => $see->idproduct,
                    "price" => $see->price,
                    "units" => 1,
                    "product" => $see
                );
            }
        }
        header("Location:" . baseUrl . "Cart/listProducts");
    }

    public function deleteAllCart()
    {
        unset($_SESSION['cart']);
        $_SESSION['listDelete'] = "Exitoso";
        header("Location:" .  baseUrl . "Cart/listProducts");
    }

    public function performBuy()
    {
        require_once('view/Card/performBuy.php');
    }

    public function realizedBuy()
    {
        if (isset($_POST)) {
            $order = new Orders();
            $stats = utilities::statsCart();
            $Client_id = $_SESSION['User']->idclient;
            $coste = $stats['priceTotal'];
            $order->setName($_POST['name']);
            $order->setDocument($_POST['document']);
            $order->setCity($_POST['city']);
            $order->setDirection($_POST['direction']);
            $order->setTelephone($_POST['telephone']);
            $order->setCoste($coste);
            $order->setStatus('Pendiente');
            $order->setClients_id($Client_id);
            $Save = $order->saveOrder();
            $line_orders = $order->saveLine_orders();
            if ($Save &&  $line_orders) {
                $_SESSION['saveOrder'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Cart/confirmed");
    }

    public function confirmed()
    {
        $Client_id = $_SESSION['User']->idclient;
        $order = new Orders();
        $order->setClients_id($Client_id);
        $oneOrder = $order->oneUserBuy();

        $products = new Orders();
        $allProducts = $products->productsOfOneOrder($oneOrder->idorder);
        $card = $_SESSION['cart'] = [];
        require_once('view/Card/confirmed.php');
    }

    public function viewOrder()
    {
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $products = new Orders();
            $allProducts = $products->productsOfOneOrder($id);

            $order = new Orders();
            $order->setIdorder($id);
            $oneOrder = $order->oneOrder();

            require_once('view/Card/detailsOrder.php');
        }
    }

    public function deleteOneProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            unset($_SESSION['cart'][$id]);
        }
        header("Location:" .  baseUrl . "Cart/listProducts");
    }

    public function plus()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $_SESSION['cart'][$id]['units']++;
        }
        header("Location:" .  baseUrl . "Cart/listProducts");
    }

    public function minus()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $_SESSION['cart'][$id]['units']--;
        }
        header("Location:" .  baseUrl . "Cart/listProducts");
    }
}

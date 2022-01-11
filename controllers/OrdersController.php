<?php
require_once('models/Orders.php');
class OrdersController
{
    public function listOrders()
    {
        utilities::isAdmin();
        $orders = new Orders();
        $allOrders = $orders->allOrders();
        require_once('view/orders/viewOrders.php');
    }

    public function detailsOrder()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $order = new Orders();
            $allProducts = $order->productsOfOneOrder($id);
            $order->setIdorder($id);
            $oneOrder = $order->oneOrder();
            require_once('view/orders/details.php');
        }
    }

    public function status()
    {
        utilities::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $order = new Orders();
            $order->setIdorder($id);
            $order->setStatus($_POST['status']);
            $update = $order->updateOrder();
            if ($update) {
                $_SESSION['edit'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Orders/detailsOrder&id=" . $id);
    }

    public function saveGuide()
    {
        utilities::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $order = new Orders();
            $order->setIdorder($id);
            $order->setGuide_number($_POST['guide_number']);
            $update = $order->saveGuide();
            if ($update) {
                $_SESSION['save'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Orders/detailsOrder&id=" . $id);
    }

}

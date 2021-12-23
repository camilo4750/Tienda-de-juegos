<?php
require_once('models/Products.php');
class CartController
{
    public function listProducts()
    {
        $cart = $_SESSION['cart'];
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
}

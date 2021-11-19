<?php
require_once('models/Productos.php');
class ProductsController
{
    public function index()
    {
        require_once 'view/Principal.php';
    }

    public function create()
    {
        require_once('view/products/create.php');
    }
}

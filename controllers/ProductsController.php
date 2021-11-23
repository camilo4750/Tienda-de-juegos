<?php
require_once('models/Products.php');
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

    public function save()
    {
        if (isset($_POST)) {
            $product = new Products();
            $product->setName($_POST['name']);
            $product->setDescription($_POST['description']);
            $product->setPrice($_POST['price']);
            $product->setStock($_POST['stock']);
            $product->setDiscount($_POST['discount']);
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $fileName = $file['name'];
                $mimetype = $file['type'];
                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/gif" || $mimetype == "image/png") {
                    if (!is_dir('Uploads/products')) {
                        mkdir('Uploads/products', 0777, true);
                    }
                    $product->setImage($fileName);
                    move_uploaded_file($file['tmp_name'], 'Uploads/products/' . $fileName);
                } else {
                    $_FILES['image'] = null;
                }
            }
            $product->setCreate_at($_POST['create_at']);
            $product->setCategory_id($_POST['Category_id']);
            $Save = $product->save();
            if ($Save) {
                $_SESSION['save'] = "exitoso";
            }
        }
        header("loacation:" . baseUrl . "Products/create");
    }
}

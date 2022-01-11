<?php
require_once('models/Products.php');
require_once('models/Comments.php');
require_once('models/Category.php');
class ProductsController
{
    public function index()
    {
        require_once 'view/Principal.php';
    }

    public function create()
    {
        utilities::isAdmin();
        require_once('view/products/create.php');
    }

    public function save()
    {
        utilities::isAdmin();
        if (isset($_POST)) {
            $product = new Products();
            $product->setName($_POST['name']);
            $product->setCreator($_POST['creator']);
            $product->setDescription($_POST['description']);
            $product->setFormat($_POST['format']);
            $product->setLanguage($_POST['language']);
            $product->setLVoices($_POST['voices']);
            $product->setLOnline($_POST['online']);
            $product->setLRequirements($_POST['requirements']);
            $product->setLPrice_init($_POST['price_init']);
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
            $product->setStatus($_POST['status']);
            $product->setCategory_id($_POST['Category_id']);
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product->setIdproduct($id);
                $Edit = $product->editProduct();
            } else {
                $Save = $product->save();
            }
            if ($Save) {
                $_SESSION['save'] = "exitoso";
            }
            if ($Edit) {
                $_SESSION['edit'] = "exitoso";
            }
        }
        header("location:" . baseUrl . "Products/view");
    }

    public function view()
    {
        utilities::isAdmin();
        $PRODUCTS = new Products();
        $allProducts = $PRODUCTS->all();
        $totalInit = $PRODUCTS->totalPriceProducts();
        $totalProduct = $PRODUCTS->totalPriceProductsClient();
        require_once('view/products/view.php');
    }

    public function viewProduct()
    {
        utilities::isAdmin();

        if ($_GET['id']) {
            $id = $_GET['id'];
            $Product = new Products();
            $Product->setIdproduct($id);
            $PRODUCT = $Product->oneProduct();
            require_once('view/products/viewProduct.php');
        }
    }

    public function edit()
    {
        utilities::isAdmin();
        if ($_GET['id']) {
            $id = $_GET['id'];
            $Product = new Products();
            $Product->setIdproduct($id);
            $editProduct = $Product->oneProduct();
            require_once('view/products/create.php');
        }
    }

    public function active()
    {
        utilities::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Product = new Products();
            $Product->setIdproduct($id);
            $Product->setStatus('Activo');
            $PRODUCT = $Product->changeStatus();
            if ($PRODUCT) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Products/view");
    }

    public function inactive()
    {
        utilities::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Product = new Products();
            $Product->setIdproduct($id);
            $Product->setStatus('Inactivo');
            $PRODUCT = $Product->changeStatus();
            if ($PRODUCT) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Products/view");
    }

    public function seeProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Product = new Products();
            $Product->setIdproduct($id);
            $seeProduct = $Product->oneProduct();

            $Comment = new Comments();
            $Comment->setProducts_id($id);
            $COMMENTS = $Comment->seeComments();
            $Count = $Comment->CountComments();
            require_once('view/products/seeProductBuy.php');
        }
    }

    public function allCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = new Category();
            $category->setIdcategory($id);
            $nameCategory = $category->oneCategory();

            $products = new Products();
            $products->setCategory_id($id);
            $allProducts = $products->allProductsForCategory();

            require_once('view/products/seeAllForCategoy.php');
        }
    }

    public function allProducts()
    {
        $products = new Products();
        $allProducts = $products->allProducts();
        require_once('view/products/allProducts.php');
    }

    public function stockEmpty()
    {
        $product = new Products();
        $allOnStock = $product->emptyStock();
        require_once('view/products/stocks.php');
    }
}

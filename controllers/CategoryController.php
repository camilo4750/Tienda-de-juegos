<?php
require_once('models/Category.php');
class CategoryController
{
    public function create()
    {
        require_once('view/category/create.php');
    }

    public function save()
    {
        if (isset($_POST)) {
            $Category = new Category();
            $Category->setName($_POST['name']);
            $Save = $Category->save();

            if ($Save) {
                $_SESSION['save'] = "exitoso";
            } else {
                echo "error en el save";
            }
        } else {
            echo "error en post";
        }
        header("Location:" .  baseUrl . "Category/create");
    }

    public function view()
    {
        $CATEGORY = new Category();
        $CATEGORY = $CATEGORY->allCategory();
        require_once('view/category/view.php');;
    }
}

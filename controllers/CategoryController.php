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
            $Category->setStatus('Activo');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $Category->setIdcategory($id);
                $Edit = $Category->editCategory();
            } else {
                $Save = $Category->save();
            }
            if ($Edit) {
                $_SESSION['edit'] = "exitoso";
            } else {
                echo "error al editar";
            }
            if ($Save) {
                $_SESSION['save'] = "exitoso";
            } else {
                echo "error en el save";
            }
        } else {
            echo "error en post";
        }
        header("Location:" .  baseUrl . "Category/view");
    }

    public function view()
    {
        $CATEGORIES = new Category();
        $CATEGORIES = $CATEGORIES->allCategories();
        require_once('view/category/view.php');;
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $CATEGORY = new Category();
            $CATEGORY->setIdcategory($id);
            $CATEGORY = $CATEGORY->oneCategory();
            require_once('view/category/create.php');
        } else {
            header("Location:" .  baseUrl . "Category/view");
        }
    }

    public function active()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Category = new Category();
            $Category->setIdcategory($id);
            $Category->setStatus('Activo');
            $Active = $Category->changeStatus();
            if ($Active) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Category/view");
    }

    public function inactive()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Category = new Category();
            $Category->setIdcategory($id);
            $Category->setStatus('Inactivo');
            $Inactive = $Category->changeStatus();
            if ($Inactive) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Category/view");
    }
}

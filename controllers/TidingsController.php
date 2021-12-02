<?php
require_once('models/Tidings.php');
class TidingsController
{
    public function create()
    {
        require_once('view/tidings/create.php');
    }

    public function save()
    {
        if (isset($_POST)) {
            $tidings = new Tidings();
            $tidings->setName($_POST['name']);
            $tidings->setDescription($_POST['description']);
            $tidings->setCreate_at($_POST['create_at']);
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $fileName = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/gif" || $mimetype == "image/jpeg") {
                    if (!is_dir('Uploads/Tidings')) {
                        mkdir('Uploads/Tidings', 0777, true);
                    }
                    $tidings->setImage($fileName);
                    move_uploaded_file($file['tmp_name'], 'Uploads/Tidings/' . $fileName);
                } else {
                    $_FILES['image'] = null;
                }
            }
            $tidings->setStatus('Activo');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tidings->setIdtiding($id);
                $Edit = $tidings->editTiding();
            } else {
                $Save = $tidings->save();
            }
            if ($Edit) {
                $_SESSION['edit'] = "exitoso";
            }
            if ($Save) {
                $_SESSION['save'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Tidings/view");
    }

    public function view()
    {
        $TIDINGS = new Tidings();
        $TIDINGS = $TIDINGS->total();
        require_once('view/tidings/view.php');
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Tidings = new Tidings();
            $Tidings->setIdtiding($id);
            $TIDINGS = $Tidings->allOne();
            require_once('view/tidings/create.php');
        } else {
            header("Location:" . baseUrl . "Tidings/view");
        }
    }

    public function viewTiding()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Tiding = new Tidings();
            $Tiding->setIdtiding($id);
            $TIDING = $Tiding->allOne();
            require_once('view/tidings/viewTiding.php');
        } else {
            header("Location:" . baseUrl . "Tidings/view");
        }
    }

    public function active()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Tiding = new Tidings();
            $Tiding->setIdtiding($id);
            $Tiding->setStatus('Activo');
            $TIDING = $Tiding->changeStatus();
            if ($TIDING) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Tidings/view");
    }

    public function inactive()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Tiding = new Tidings();
            $Tiding->setIdtiding($id);
            $Tiding->setStatus('Inactivo');
            $TIDING = $Tiding->changeStatus();
            if ($TIDING) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Tidings/view");
    }
}

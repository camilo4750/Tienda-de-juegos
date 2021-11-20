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
            $Save = $tidings->save();
            if ($Save) {
                $_SESSION['save'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Tidings/create");
    }

    public function view()
    {
        $TIDINGS = new Tidings();
        $TIDINGS = $TIDINGS->total();
        require_once('view/tidings/view.php');
    }
}

<?php
require_once('models/Clients.php');
class ClientsController
{
    public function sessions()
    {
        require_once 'view/clients/sessions.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $Client = new Clients();
            $Client->setName($_POST['name']);
            $Client->setSurname($_POST['surname']);
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/gif" || $mimetype == "image/jpeg") {
                    if (!is_dir('Uploads/profiles')) {
                        mkdir('Uploads/profiles', 0777, true);
                    }
                    $Client->setImage($filename);
                    move_uploaded_file($file['tmp_name'], 'Uploads/profiles/' . $filename);
                }
            }
            $Client->setDescription($_POST['description']);
            $Client->setEmail($_POST['email']);
            $Client->setPassword($_POST['password']);
            $Client->setStatus('activo');
            $Client->setRol('user');
            $Client->setClient_fixed('inactivo');
            $Save = $Client->save();

            if ($Save) {
                $_SESSION['save'] = "exitoso";
            } else {
                echo "error2";
            }
        }
        header("location:" . baseUrl . "Clients/sessions");
    }

    public function login()
    {
        if (isset($_POST)) {
            $CLIENT = new Clients();
            $CLIENT->setEmail($_POST['email']);
            $CLIENT->setPassword($_POST['password']);
            $identificado = $CLIENT->login();
            if ($identificado && is_object($identificado)) {
                if ($identificado->rol == 'user') {
                    $identificado->password = null;
                    $_SESSION['User'] = $identificado;
                    header("Location:" . baseUrl . "Products/index");
                }
            } else {
                $_SESSION['noIdentity'] = "error1";
                header("Location:" . baseUrl . "Clients/sessions");
            }
        } else {
            echo "ERROR 2";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['User'])) {
            unset($_SESSION['User']);
        }
        header("Location:" . baseUrl . "Products/index");
    }
}

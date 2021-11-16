<?php
require_once('models/Users.php');
class UsersController
{
    public function session()
    {
        $User = new Users();
        $total = $User->total();
        require_once 'view/users/session.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $User = new Users();
            $User->setName($_POST['name']);
            $User->setSurname($_POST['surname']);
            $User->setEmail($_POST['email']);
            $User->setPassword($_POST['password']);
            $User->setRol('Admin');
            $save = $User->save();
            if ($save) {
                $_SESSION['save'] = "exitoso";
            } else {
                echo "ERROR 2";
            }
        } else {
            echo "error 1";
        }
        header("Location:" . baseUrl . "users/session");
    }

    public function login()
    {
        if (isset($_POST)) {
            $USER = new Users();
            $USER->setEmail($_POST['email']);
            $USER->setPassword($_POST['password']);
            $identificado = $USER->login();
            if ($identificado && is_object($identificado)) {
                if ($identificado->rol == "Admin") {
                    $identificado->password = null;
                    $_SESSION['Admin'] = $identificado;
                    header("Location:" . baseUrl . "Users/perfil");
                }
            } else {
                $_SESSION['noIdentity'] = "error1";
                echo "error1";
                header("Location:" . baseUrl . "Users/session");
            }
        } else {
            echo "error en post";
        }
    }

    public function perfil()
    {
        require_once('view/users/profile.php');
    }

    public function logout()
    {
        if (isset($_SESSION['Admin'])) {
            unset($_SESSION['Admin']);
        }
        header("Location:" . baseUrl . "Products/index");
    }
}

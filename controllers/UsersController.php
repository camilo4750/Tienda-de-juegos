<?php
require_once('models/Users.php');
require_once('models/Clients.php');
require_once('models/Participants.php');
require_once('models/Events.php');
require_once('models/Products.php');
require_once('models/Comments.php');
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
                    header("Location:" . baseUrl . "Users/panel");
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

    public function panel()
    {
        $Clients = new Clients();
        $totalClients = $Clients->countClients();
        $Participants = new Participants();
        $totalParticipants = $Participants->countParticipants();
        $Events = new Events();
        $totalEvents = $Events->countEvents();
        $Products = new Products();
        $totalProducts = $Products->countProducts();
        $Comments = new Comments();
        $totalComments = $Comments->totalCount();
        require_once('view/users/panel.php');
    }

    public function logout()
    {
        if (isset($_SESSION['Admin'])) {
            unset($_SESSION['Admin']);
        }
        header("Location:" . baseUrl . "Products/index");
    }
}

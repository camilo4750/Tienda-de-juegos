<?php
require_once('models/Clients.php');
require_once('models/Orders.php');
require_once('models/Participants.php');
class ClientsController
{
    public function sessions()
    {
        $client = new Clients();
        $admin = $client->countAdmin();
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
            $Client->setNickname($_POST['nickname']);
            $Client->setPassword($_POST['password']);
            $Client->setStatus('activo');
            $Client->setRol($_POST['rol']);
            $Client->setClient_fixed('inactivo');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $Client->setIdclient($id);
                $Edit = $Client->UpdateClient();
            } else {
                $Save = $Client->save();
            }

            if ($Edit) {
                $_SESSION['edit'] = "exitoso";
                header("location:" . baseUrl . "Clients/myProfile&id=" . $_SESSION['User']->idclient);
            } else {
                echo "error2";
            }

            if ($Save) {
                $_SESSION['save'] = "exitoso";
                header("location:" . baseUrl . "Clients/sessions");
            } else {
                echo "error2";
            }
        }
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
                if ($identificado->rol == 'admin') {
                    $identificado->password = null;
                    $_SESSION['Admin'] = $identificado;
                    header("Location:" . baseUrl . "Users/Panel");
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

    public function view()
    {
        $CLIENTS = new Clients();
        $CLIENTS = $CLIENTS->allClients();
        require_once('view/clients/view.php');
    }

    public function myProfile()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Client = new Clients();
            $Client->setIdclient($id);
            $Client = $Client->oneClient();

            $events = new Participants();
            $events->setClients_id($id);
            $countEvents = $events->countEventsForUser();

            $order = new Orders();
            $order->setClients_id($id);
            $count = $order->countOrders();
            $order = $order->ordersForClient();


            require_once('view/clients/myProfile.php');
        } else {
            header("Location:" .  baseUrl . "Error/peticion");
        }
    }
}

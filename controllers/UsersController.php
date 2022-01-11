<?php
require_once('models/Users.php');
require_once('models/Clients.php');
require_once('models/Participants.php');
require_once('models/Events.php');
require_once('models/Products.php');
require_once('models/Comments.php');
require_once('models/Orders.php');
class UsersController
{
    public function panel()
    {
        utilities::isAdmin();
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
        $Orders = new Orders();
        $ValorPedidos = $Orders->ValueOrders();
        $pendientes = $Orders->countOrdersPending();
        $preparacion = $Orders->countOrdersPreparation();
        $enviados = $Orders->countOrdersSend();
        $entregados = $Orders->countOrdersDelivered();
        $stock = $Products->totalStock();
        require_once('view/users/panel.php');
    }

    public function logout()
    {
        utilities::isAdmin();
        if (isset($_SESSION['Admin'])) {
            unset($_SESSION['Admin']);
        }
        header("Location:" . baseUrl . "Products/index");
    }

    public function profileAdmin()
    {
        utilities::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Admin = new Clients();
            $Admin->setIdclient($id);
            $adminData = $Admin->oneClient();
            require_once('view/users/profile.php');
        }
    }
}

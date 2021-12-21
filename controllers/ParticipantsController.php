<?php
require_once('models/Participants.php');
class ParticipantsController
{
    public function view()
    {
        $Participants = new Participants();
        $allParticipants = $Participants->allParticipants();
        require_once('view/participants/view.php');
    }

    public function register()
    {
        if (isset($_POST)) {
            $Participant = new Participants();
            $Participant->setReason($_POST['reason']);
            $Participant->setTerms($_POST['terms']);
            $Participant->setTelephone($_POST['telephone']);
            $Participant->setInstall($_POST['install']);
            $Participant->setStatus('Inactivo');
            $Participant->setQuarters('Inactivo');
            $Participant->setSemifinal('Inactivo');
            $Participant->setFinal('Inactivo');
            $Participant->setWinner('Inactivo');
            $Participant->setEvents_id($_POST['Events_id']);
            $Participant->setClients_id($_POST['Clients_id']);
            $Save = $Participant->save();
            if (isset($Save)) {
                $_SESSION['save'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Events/seeEvent&id=" . $_POST['Events_id']);
    }

    public function activeStatus()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $active = new Participants();
            $active->setIdparticipant($id);
            $active->setStatus('Activo');
            $Status = $active->status();
            if ($Status) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function inactiveStatus()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $inactive = new Participants();
            $inactive->setIdparticipant($id);
            $inactive->setStatus('Inactivo');
            $Status = $inactive->status();
            if ($Status) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function activeQuarters()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $active = new Participants();
            $active->setIdparticipant($id);
            $active->setQuarters('Activo');
            $Status = $active->statusQuarters();
            if ($Status) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function inactiveQuarters()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $inactive = new Participants();
            $inactive->setIdparticipant($id);
            $inactive->setQuarters('Inactivo');
            $Status = $inactive->statusQuarters();
            if ($Status) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function activeSemifinal()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $inactive = new Participants();
            $inactive->setIdparticipant($id);
            $inactive->setSemifinal('Activo');
            $Status = $inactive->statusSemifinal();
            if ($Status) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function inactiveSemifinal()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $inactive = new Participants();
            $inactive->setIdparticipant($id);
            $inactive->setSemifinal('Inactivo');
            $Status = $inactive->statusSemifinal();
            if ($Status) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function activeFinal()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $inactive = new Participants();
            $inactive->setIdparticipant($id);
            $inactive->setFinal('Activo');
            $Status = $inactive->statusFinal();
            if ($Status) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function inactiveFinal()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $inactive = new Participants();
            $inactive->setIdparticipant($id);
            $inactive->setFinal('Inactivo');
            $Status = $inactive->statusFinal();
            if ($Status) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Participants/view");
    }

    public function seeParticipant()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Participant = new Participants();
            $Participant->setIdparticipant($id);
            $oneParticipant = $Participant->oneParticipant();
            require_once('view/participants/SeeParticipant.php');
        }
    }
}

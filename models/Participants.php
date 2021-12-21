<?php
class Participants
{
    private $idparticipant;
    private $reason;
    private $terms;
    private $telephone;
    private $install;
    private $status;
    private $quarters;
    private $semifinal;
    private $final;
    private $winner;
    private $Events_id;
    private $Clients_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdparticipant()
    {
        return $this->idparticipant;
    }
    public function setIdparticipant($idparticipant)
    {
        $this->idparticipant = $idparticipant;
        return $this;
    }

    public function getReason()
    {
        return $this->reason;
    }
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    public function getTerms()
    {
        return $this->terms;
    }
    public function setTerms($terms)
    {
        $this->terms = $terms;
        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getInstall()
    {
        return $this->install;
    }
    public function setInstall($install)
    {
        $this->install = $install;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getQuarters()
    {
        return $this->quarters;
    }
    public function setQuarters($quarters)
    {
        $this->quarters = $quarters;
        return $this;
    }

    public function getSemifinal()
    {
        return $this->semifinal;
    }
    public function setSemifinal($semifinal)
    {
        $this->semifinal = $semifinal;
        return $this;
    }

    public function getFinal()
    {
        return $this->final;
    }
    public function setFinal($final)
    {
        $this->final = $final;
        return $this;
    }

    public function getEvents_id()
    {
        return $this->Events_id;
    }
    public function setEvents_id($Events_id)
    {
        $this->Events_id = $Events_id;
        return $this;
    }

    public function getClients_id()
    {
        return $this->Clients_id;
    }
    public function setClients_id($Clients_id)
    {
        $this->Clients_id = $Clients_id;
        return $this;
    }

    public function getWinner()
    {
        return $this->winner;
    }
    public function setWinner($winner)
    {
        $this->winner = $winner;
        return $this;
    }

    public function idClient($idclient)
    {
        $Participant =  $this->db->query("SELECT * FROM participants WHERE Clients_id = '{$idclient}'");
        return $Participant->fetch_object();
    }

    public function oneCountParticipants($idEvent)
    {
        $Participant =  $this->db->query("SELECT COUNT(*) AS 'total' FROM participants WHERE Events_id = '$idEvent' ");
        return $Participant->fetch_object();
    }
    public function save()
    {
        $SQL = "INSERT INTO participants VALUES(NULL, '{$this->getReason()}', '{$this->getTerms()}', '{$this->getTelephone()}', '{$this->getInstall()}', '{$this->getStatus()}', '{$this->getQuarters()}', '{$this->getSemifinal()}', '{$this->getFinal()}', '{$this->getWinner()}', '{$this->getEvents_id()}', '{$this->getClients_id()}');";
        $saveParticipants = $this->db->query($SQL);
        $Save = false;
        if ($saveParticipants) {
            $Save =  true;
        }
        return $Save;
    }

    public function allParticipants()
    {
        $allParticipants = $this->db->query("SELECT P.*, C.name, C.surname, E.name AS 'event' FROM participants P INNER JOIN clients C ON P.Clients_id = C.idclient INNER JOIN events E ON P.Events_id = E.idevent ORDER BY P.idparticipant;");
        return $allParticipants;
    }

    public function status()
    {
        $SQL = "UPDATE participants SET status = '{$this->getStatus()}' WHERE idparticipant = '{$this->getIdparticipant()}'";
        $changeStatus = $this->db->query($SQL);
        $Save = false;
        if ($changeStatus) {
            $Save =  true;
        }
        return $Save;
    }

    public function statusQuarters()
    {
        $SQL = "UPDATE participants SET quarters = '{$this->getQuarters()}' WHERE idparticipant = '{$this->getIdparticipant()}'";
        $changeQuarters = $this->db->query($SQL);
        $Save = false;
        if ($changeQuarters) {
            $Save =  true;
        }
        return $Save;
    }

    public function statusSemifinal()
    {
        $SQL = "UPDATE participants SET semifinal = '{$this->getSemifinal()}' WHERE idparticipant = '{$this->getIdparticipant()}'";
        $changeSemifinal = $this->db->query($SQL);
        $Save = false;
        if ($changeSemifinal) {
            $Save =  true;
        }
        return $Save;
    }


    public function statusFinal()
    {
        $SQL = "UPDATE participants SET final = '{$this->getFinal()}' WHERE idparticipant = '{$this->getIdparticipant()}'";
        $changeFinal = $this->db->query($SQL);
        $Save = false;
        if ($changeFinal) {
            $Save =  true;
        }
        return $Save;
    }

    public function statusWinner()
    {
        $SQL = "UPDATE participants SET winner = '{$this->getWinner()}' WHERE idparticipant = '{$this->getIdparticipant()}'";
        $changeFinal = $this->db->query($SQL);
        $Save = false;
        if ($changeFinal) {
            $Save =  true;
        }
        return $Save;
    }

    public function oneParticipant()
    {
        $oneParticipant = $this->db->query("SELECT P.*, C.idclient, C.name, C.surname, C.email, C.image AS 'imageClient', C.description AS 'descriptionClient', C.create_at AS 'createClient', C.client_fixed, E.name AS 'nameEvent', E.description, E.create_at AS 'createEvent', E.expires_in, E.image AS 'imageEvent' FROM participants P INNER JOIN clients C ON P.Clients_id = C.idclient INNER JOIN events E ON P.Events_id = E.idevent WHERE idparticipant = '{$this->getIdparticipant()}' ORDER BY P.idparticipant;");
        return $oneParticipant->fetch_object();
    }

    public function ClassificationForQuarters($idEvent)
    {
        $ClassificationForQuarters = $this->db->query("SELECT P.*, C.idclient, C.name, C.surname, C.email, C.nickname, C.image, C.status FROM participants P INNER JOIN clients C ON P.Clients_id = C.idclient  WHERE Events_id = '{$idEvent}' AND quarters = 'Activo';");
        return $ClassificationForQuarters;
    }

    public function ClassificationForSemifinal($idEvent)
    {
        $ClassificationForSemifinal = $this->db->query("SELECT P.*, C.idclient, C.name, C.surname, C.email, C.nickname, C.image, C.status FROM participants P INNER JOIN clients C ON P.Clients_id = C.idclient  WHERE Events_id = '{$idEvent}' AND semifinal = 'Activo';");
        return $ClassificationForSemifinal;
    }


    public function ClassificationForFinal($idEvent)
    {
        $ClassificationForFinal = $this->db->query("SELECT P.*, C.idclient, C.name, C.surname, C.email, C.nickname, C.image, C.status FROM participants P INNER JOIN clients C ON P.Clients_id = C.idclient  WHERE Events_id = '{$idEvent}' AND final = 'Activo';");
        return $ClassificationForFinal;
    }


    public function ClassificationForWinner($idEvent)
    {
        $ClassificationForWinner = $this->db->query("SELECT P.*, C.idclient, C.name, C.surname, C.email, C.nickname, C.image, C.status FROM participants P INNER JOIN clients C ON P.Clients_id = C.idclient  WHERE Events_id = '{$idEvent}' AND winner = 'Activo';");
        return $ClassificationForWinner;
    }

    public function EventsForClient($idClient)
    {
        $ForClient = $this->db->query("SELECT P.*, E.* FROM participants P INNER JOIN events E ON P.Events_id = E.idevent WHERE P.Clients_id = '{$idClient}';");
        return $ForClient;
    }
}

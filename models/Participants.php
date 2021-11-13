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
}

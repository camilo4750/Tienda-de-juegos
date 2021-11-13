<?php
class Orders
{
    private $idorder;
    private $city;
    private $direction;
    private $telephone;
    private $coste;
    private $create_at;
    private $status;
    private $Clients_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdorder()
    {
        return $this->idorder;
    }
    public function setIdorder($idorder)
    {
        $this->idorder = $idorder;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getDirection()
    {
        return $this->direction;
    }
    public function setDirection($direction)
    {
        $this->direction = $direction;
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

    public function getCoste()
    {
        return $this->coste;
    }
    public function setCoste($coste)
    {
        $this->coste = $coste;
        return $this;
    }

    public function getCreate_at()
    {
        return $this->create_at;
    }
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
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

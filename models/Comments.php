<?php
class Comments
{
    private $idcomment;
    private $comment;
    private $create_at;
    private $Products_id;
    private $Clients_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdcomment()
    {
        return $this->idcomment;
    }
    public function setIdcomment($idcomment)
    {
        $this->idcomment = $idcomment;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
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

    public function getProducts_id()
    {
        return $this->Products_id;
    }
    public function setProducts_id($Products_id)
    {
        $this->Products_id = $Products_id;
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

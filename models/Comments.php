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

    public function save()
    {
        $SQL = "INSERT INTO comments VALUES(NULL, '{$this->getComment()}', CURDATE(), CURTIME(), '{$this->getProducts_id()}', '{$this->getClients_id()}');";
        $Comment = $this->db->query($SQL);
        $save = false;
        if ($Comment) {
            $save = true;
        }
        return $save;
    }

    public function seeComments()
    {
        $Comments = $this->db->query("SELECT C.*, P.* FROM comments C INNER JOIN clients P ON C.Clients_id = P.idclient WHERE Products_id = '{$this->getProducts_id()}' ORDER BY C.idcomment");
        return $Comments;
    }

    public function CountComments()
    {
        $Count = $this->db->query("SELECT COUNT(*) AS 'count' FROM comments WHERE Products_id = '{$this->getProducts_id()}'");
        return $Count->fetch_object();
    }

    public function editComment()
    {
        $SQL = "UPDATE comments SET comment = '{$this->getComment()}' WHERE idcomment = '{$this->getIdcomment()}'";

        $Comment = $this->db->query($SQL);
        $Edit = false;
        if ($Comment) {
            $Edit = true;
        }
        return $Edit;
    }

    public function deleteComment()
    {
        $SQL = "DELETE FROM comments WHERE idcomment = '{$this->getIdcomment()}'";
        $Comment = $this->db->query($SQL);
        $Delete = false;
        if ($Comment) {
            $Delete = true;
        }
        return $Delete;
    }

    public function totalCount()
    {
        $Comments = $this->db->query("SELECT COUNT(*) AS 'total' FROM comments");
        return $Comments->fetch_object();
    }

    public function allcommnets()
    {
        $view = $this->db->query("SELECT C.*, P.name AS 'namePerson', A.name AS 'nameProduct' FROM comments C INNER JOIN clients P ON C.Clients_id = P.idclient INNER JOIN products A ON C.Products_id = A.idproduct ORDER BY C.idcomment DESC;");
        return $view;
    }
}

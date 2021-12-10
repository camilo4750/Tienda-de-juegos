<?php
class Tidings
{
    private $idtiding;
    private $name;
    private $description;
    private $create_at;
    private $image;
    private $status;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdtiding()
    {
        return $this->idtiding;
    }
    public function setIdtiding($idtiding)
    {
        $this->idtiding = $idtiding;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
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

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
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

    public function save()
    {
        $SQL = "INSERT INTO tidings VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getCreate_at()}', '{$this->getImage()}', '{$this->getStatus()}');";
        $tidings = $this->db->query($SQL);

        $save = false;
        if ($tidings) {
            $save = true;
        }
        return $save;
    }

    public function total()
    {
        $TIDINGS = $this->db->query("SELECT idtiding, name, LEFT(description, 55) AS 'descriptionCor', description, create_at, image, status   FROM tidings");
        return $TIDINGS;
    }

    public function allOne()
    {
        $Tiding = $this->db->query("SELECT * FROM tidings WHERE idtiding = '{$this->getIdtiding()}'");
        return $Tiding->fetch_object();
    }

    public function editTiding()
    {
        $SQL = "UPDATE tidings SET name = '{$this->getName()}', description = '{$this->getDescription()}', create_at = '{$this->getCreate_at()}'  ";
        if ($this->getImage() != null) {
            $SQL .= ", image = '{$this->getImage()}'";
        }
        $SQL .= "WHERE idtiding = '{$this->getIdtiding()}'";
        $Tiding = $this->db->query($SQL);
        $edit = false;
        if ($Tiding) {
            $edit = true;
        }
        return $edit;
    }

    public function changeStatus()
    {
        $SQL = "UPDATE tidings SET status = '{$this->getStatus()}' WHERE idtiding = '{$this->getIdtiding()}'";
        $status = $this->db->query($SQL);
        $edit = false;
        if ($status) {
            $edit = true;
        }
        return $edit;
    }
}

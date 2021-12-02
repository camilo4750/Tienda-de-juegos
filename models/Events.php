<?php
class Events
{
    private $idevent;
    private $name;
    private $description;
    private $create_at;
    private $expires_in;
    private $image;
    private $status;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdevent()
    {
        return $this->idevent;
    }
    public function setIdevent($idevent)
    {
        $this->idevent = $idevent;
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

    public function getExpires_in()
    {
        return $this->expires_in;
    }
    public function setExpires_in($expires_in)
    {
        $this->expires_in = $expires_in;
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
        $SQL = "INSERT INTO events VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getCreate_at()}', '{$this->getExpires_in()}', '{$this->getImage()}', '{$this->getStatus()}');";
        $event = $this->db->query($SQL);
        $Save = false;
        if ($event) {
            $Save = true;
        }
        return $Save;
    }

    public function all()
    {
        $EVENTS = $this->db->query("SELECT idevent, name, description, LEFT(description, 80) AS 'descriptionCor', create_at, expires_in, image, status FROM events;");
        return $EVENTS;
    }

    public function oneEvent()
    {
        $EVENT = $this->db->query("SELECT * FROM events WHERE idevent = '{$this->getIdevent()}'");
        return $EVENT->fetch_object();
    }

    public function changeStatus()
    {
        $SQL = "UPDATE events SET status = '{$this->getStatus()}' WHERE idevent = '{$this->getIdevent()}'";
        $status = $this->db->query($SQL);
        $edit = false;
        if ($status) {
            $edit = true;
        }
        return $edit;
    }

    public function edit()
    {
        $SQL = "UPDATE events SET status = '{$this->getStatus()}' WHERE idevent = '{$this->getIdevent()}'";
        $status = $this->db->query($SQL);
        $edit = false;
        if ($status) {
            $edit = true;
        }
        return $edit;
    }
}

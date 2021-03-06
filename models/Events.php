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
    private $numberParticipants;
    private $type;
    private $link;
    private $finalized;
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

    public function getNumberParticipants()
    {
        return $this->numberParticipants;
    }
    public function setNumberParticipants($numberParticipants)
    {
        $this->numberParticipants = $numberParticipants;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getFinalized()
    {
        return $this->finalized;
    }
    public function setFinalized($finalized)
    {
        $this->finalized = $finalized;
        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }
    public function save()
    {
        $SQL = "INSERT INTO events VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getCreate_at()}', '{$this->getExpires_in()}', '{$this->getImage()}', '{$this->getStatus()}', '{$this->getNumberParticipants()}', '{$this->getType()}', '{$this->getFinalized()}', 'Null');";
        $event = $this->db->query($SQL);
        $Save = false;
        if ($event) {
            $Save = true;
        }
        return $Save;
    }

    public function all()
    {
        $EVENTS = $this->db->query("SELECT idevent, name, description, LEFT(description, 40) AS 'descriptionCor', create_at, expires_in, image, status, numberParticipants, type, finalized, link FROM events;");
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

    public function editEvent()
    {
        $SQL = "UPDATE events SET name = '{$this->getName()}', description = '{$this->getDescription()}', create_at = '{$this->getCreate_at()}', numberParticipants = '{$this->getNumberParticipants()}', type = '{$this->getType()}'  ";
        if ($this->getExpires_in() != null) {
            $SQL .= ", expires_in = '{$this->getExpires_in()}'";
        }
        if ($this->getImage() != null) {
            $SQL .= ", image = '{$this->getImage()}'";
        }
        if ($this->getLink() != null) {
            $SQL .= ", link = '{$this->getLink()}'";
        }
        $SQL .= " WHERE idevent = '{$this->getIdevent()}'";

        $status = $this->db->query($SQL);
        $edit = false;
        if ($status) {
            $edit = true;
        }
        return $edit;
    }

    public function countEvents()
    {
        $Events = $this->db->query("SELECT COUNT(*) AS 'total' FROM events");
        return $Events->fetch_object();
    }

    public function ongoingEvents()
    {
        $ongoing = $this->db->query("SELECT * FROM events WHERE Finalized = 'No'");
        return $ongoing;
    }
    public function completedEvents()
    {
        $ongoing = $this->db->query("SELECT * FROM events WHERE Finalized = 'Si'");
        return $ongoing;
    }

    public function seeEventOne()
    {
        $seeEvent = $this->db->query("SELECT * FROM events WHERE idevent = '{$this->getIdevent()}'");
        return $seeEvent->fetch_object();
    }
}

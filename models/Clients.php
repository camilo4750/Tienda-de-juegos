<?php
class Clients
{
    private $idclient;
    private $name;
    private $surname;
    private $email;
    private $image;
    private $description;
    private $password;
    private $create_at;
    private $status;
    private $rol;
    private $client_fixed;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdclient()
    {
        return $this->idclient;
    }
    public function setIdclient($idclient)
    {
        $this->idclient = $idclient;
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

    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
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

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    public function setPassword($password)
    {
        $this->password = $password;
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

    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
    }

    public function getClient_fixed()
    {
        return $this->client_fixed;
    }
    public function setClient_fixed($client_fixed)
    {
        $this->client_fixed = $client_fixed;
        return $this;
    }

    public function save()
    {
        $SQL = "INSERT INTO clients VALUES(NULL, '{$this->getName()}', '{$this->getSurname()}', '{$this->getEmail()}', '{$this->getImage()}', '{$this->getDescription()}', '{$this->getPassword()}', CURDATE(), '{$this->getStatus()}', '{$this->getRol()}', '{$this->getClient_fixed()}');";
        $Client = $this->db->query($SQL);
        $save = false;
        if ($Client) {
            $save = true;
        }
        return $save;
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        $SQL = "SELECT * FROM clients WHERE email = '{$email}'";
        $login = $this->db->query($SQL);

        if ($login && $login->num_rows == 1) {
            $CLIENT = $login->fetch_object();
            $verify = password_verify($password, $CLIENT->password);
            if ($verify) {
                $result = $CLIENT;
            }
        }
        return $result;
    }

    public function allClients()
    {
        $CLIENTS = $this->db->query("SELECT * FROM clients");
        return $CLIENTS;
    }
}

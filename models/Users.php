<?php
class Users
{
    private $iduser;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $rol;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIduser()
    {
        return $this->iduser;
    }
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
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

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    public function setPassword($password)
    {
        $this->password = $password;
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

    public function save()
    {
        $SQL = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getSurname()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getRol()}');";
        $User = $this->db->query($SQL);

        $save = false;
        if ($User) {
            $save = true;
        } else {
            echo $SQL;
        }
        return $save;
    }

    public function total()
    {
        $Admin = $this->db->query("SELECT COUNT(iduser) AS 'total' FROM users");
        return $Admin->fetch_object();
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        $SQL = "SELECT * FROM users WHERE email = '{$email}'";
        $login = $this->db->query($SQL);

        if ($login && $login->num_rows == 1) {
            $USER = $login->fetch_object();
            $verify = password_verify($password, $USER->password);
            if ($verify) {
                $result = $USER;
            }
        }
        return $result;
    }
}

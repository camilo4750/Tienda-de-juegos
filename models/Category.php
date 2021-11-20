<?php
class Category
{
    private $idcategory;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdcategory()
    {
        return $this->idcategory;
    }
    public function setIdcategory($idcategory)
    {
        $this->idcategory = $idcategory;
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

    public function save()
    {
        $SQL = "INSERT INTO category VALUES(NULL, '{$this->getName()}');";
        $Category = $this->db->query($SQL);

        $save = false;
        if ($Category) {
            $save = true;
        }
        return $save;
    }

    public function allCategory()
    {
        $CATEGORY = $this->db->query("SELECT * FROM category");
        return $CATEGORY;
    }
}

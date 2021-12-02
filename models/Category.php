<?php
class Category
{
    private $idcategory;
    private $name;
    private $status;
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
        $SQL = "INSERT INTO category VALUES(NULL, '{$this->getName()}');";
        $Category = $this->db->query($SQL);

        $save = false;
        if ($Category) {
            $save = true;
        }
        return $save;
    }

    public function allCategories()
    {
        $CATEGORIES = $this->db->query("SELECT * FROM category");
        return $CATEGORIES;
    }


    public function menuCategories()
    {
        $CATEGORIES = $this->db->query("SELECT * FROM category WHERE status = 'Activo'");
        return $CATEGORIES;
    }

    public function oneCategory()
    {
        $CATEGORY = $this->db->query("SELECT * FROM category WHERE idcategory = {$this->getIdcategory()}");
        return $CATEGORY->fetch_object();
    }

    public function editCategory()
    {
        $SQL = "UPDATE category SET name = '{$this->getName()}' WHERE idcategory = '{$this->getIdcategory()}'";
        $Category = $this->db->query($SQL);
        $edit = false;
        if ($Category) {
            $edit = true;
        }
        return $edit;
    }

    public function changeStatus()
    {
        $SQL = "UPDATE category SET status = '{$this->getStatus()}' WHERE idcategory = '{$this->getIdcategory()}'";
        $activeCategory = $this->db->query($SQL);
        $Active = false;
        if ($activeCategory) {
            $Active = true;
        }
        return $Active;
    }
}

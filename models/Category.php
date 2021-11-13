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
}

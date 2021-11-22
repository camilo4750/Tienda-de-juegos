<?php
class utilities
{
    public static function deleteSession()
    {
        $borrado = false;
        if (isset($_SESSION['save']) && $_SESSION['save'] = "exitoso") {
            $_SESSION['save'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['noIdentity']) && $_SESSION['noIdentity'] == "error1") {
            $_SESSION['noIdentity'] = null;
            $borrado = true;
        }
    }

    public static function allCategory()
    {
        require_once('models/Category.php');
        $CATEGORY = new Category();
        $CATEGORY = $CATEGORY->allCategory();
        return $CATEGORY;
    }

    public static function allTidings()
    {
        require_once('models/Tidings.php');
        $TIDINGS = new Tidings();
        $TIDINGS = $TIDINGS->total();
        return $TIDINGS;
    }
}

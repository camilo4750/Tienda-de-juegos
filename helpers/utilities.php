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
}

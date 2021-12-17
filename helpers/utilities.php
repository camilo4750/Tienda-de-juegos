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

        if (isset($_SESSION['edit']) && $_SESSION['edit'] = "exitoso") {
            $_SESSION['edit'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['delete']) && $_SESSION['delete'] = "exitoso") {
            $_SESSION['deletes'] = null;
            $borrado = true;
        }


        if (isset($_SESSION['active']) && $_SESSION['active'] = "exitoso") {
            $_SESSION['active'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['inactive']) && $_SESSION['edit'] = "inactive") {
            $_SESSION['inactive'] = null;
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
        $CATEGORY = $CATEGORY->menuCategories();
        return $CATEGORY;
    }

    public static function allTidings()
    {
        require_once('models/Tidings.php');
        $TIDINGS = new Tidings();
        $TIDINGS = $TIDINGS->total();
        return $TIDINGS;
    }

    public static function allEvent()
    {
        require_once('models/Events.php');
        $EVENTS = new Events();
        $EVENTS = $EVENTS->all();
        return $EVENTS;
    }

    public static function allProducts()
    {
        require_once('models/Products.php');
        $PRODUCTS = new Products();
        $PRODUCTS = $PRODUCTS->all();
        return $PRODUCTS;
    }
    // eventos actuales - 
    public static function ongoingEvents()
    {
        require_once('models/Events.php');
        $currentEvents = new Events();
        $currentEvents = $currentEvents->ongoingEvents();
        return $currentEvents;
    }
    // eventos finalizados - 
    public static function completedEvents()
    {
        require_once('models/Events.php');
        $FinalizedEvents = new Events();
        $FinalizedEvents = $FinalizedEvents->completedEvents();
        return $FinalizedEvents;
    }


    public static function countParticipants($idEvent)
    {
        require_once('models/Participants.php');
        $currentEvents = new Participants();
        $currentEvents = $currentEvents->oneCountParticipants($idEvent);
        return $currentEvents;
    }

    public static function classificationResult($idEvent)
    {
        require_once('models/Participants.php');
        $Classification = new Participants();
        $ResultClassification = $Classification->ClassificationForEvents($idEvent);
        return $ResultClassification;
    }
}

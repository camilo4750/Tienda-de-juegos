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
        if (isset($_SESSION['listDelete']) && $_SESSION['listDelete'] = "Exitoso") {
            $_SESSION['listDelete'] = null;
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

    public static function classificationQuarters($idEvent)
    {
        require_once('models/Participants.php');
        $Classification = new Participants();
        $ResultClassificationQuarters = $Classification->ClassificationForQuarters($idEvent);
        return $ResultClassificationQuarters;
    }

    public static function classificationSemifinal($idEvent)
    {
        require_once('models/Participants.php');
        $Classification = new Participants();
        $ResultClassificationSemifinal = $Classification->ClassificationForSemifinal($idEvent);
        return $ResultClassificationSemifinal;
    }

    public static function classificationFinal($idEvent)
    {
        require_once('models/Participants.php');
        $Classification = new Participants();
        $ResultClassificationFinal = $Classification->ClassificationForFinal($idEvent);
        return $ResultClassificationFinal;
    }


    public static function classificationWinner($idEvent)
    {
        require_once('models/Participants.php');
        $Classification = new Participants();
        $ResultClassificationWinner = $Classification->ClassificationForWinner($idEvent);
        return $ResultClassificationWinner;
    }

    public static function EventsForClients($idClient)
    {
        require_once('models/Participants.php');
        $events = new Participants();
        $resultParticipation = $events->EventsForClient($idClient);
        return $resultParticipation;
    }

    public static function statsCart()
    {
        $stats = array(
            'countProducts' => 0,
            'priceTotal' => 0,
        );

        if (isset($_SESSION['cart'])) {
            $stats['countProducts'] = count($_SESSION['cart']);

            foreach ($_SESSION['cart'] as $product) {
                $stats['priceTotal'] += $product['price'] * $product['units'];
            }
        }
        return $stats;
    }
}

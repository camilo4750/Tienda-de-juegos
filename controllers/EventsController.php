<?php
require_once('models/Events.php');

class EventsController
{
    public function create()
    {
        require_once('view/events/create.php');
    }

    public function save()
    {
        if (isset($_POST)) {
            $event = new Events();
            $event->setName($_POST['name']);
            $event->setDescription($_POST['description']);
            $event->setCreate_at($_POST['create_at']);
            $event->setExpires_in($_POST['expires_in']);
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $fileName = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/gif" || $mimetype == "image/png") {
                    if (!is_dir('Uploads/events')) {
                        mkdir('Uploads/events', 0777, true);
                    }
                    $event->setImage($fileName);
                    move_uploaded_file($file['tmp_name'], 'Uploads/events/' . $fileName);
                } else {
                    $_FILES['image'] = null;
                }
                $event->setStatus($_POST['status']);
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $event->setIdevent($id);
                    $Edit = $event->editEvent();
                } else {
                    $Save = $event->save();
                }

                if ($Save) {
                    $_SESSION['save'] = "exitoso";
                }

                if ($Edit) {
                    $_SESSION['edit'] = "exitoso";
                }
            }
        }
        header("Location:" . baseUrl . "Events/view");
    }

    public function view()
    {
        $EVENTS = new Events();
        $EVENTS = $EVENTS->all();
        require_once('view/events/view.php');
    }


    public function active()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Event = new Events();
            $Event->setIdevent($id);
            $Event->setStatus('Activo');
            $EVENT = $Event->changeStatus();
            if ($EVENT) {
                $_SESSION['active'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Events/view");
    }

    public function inactive()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Event = new Events();
            $Event->setIdevent($id);
            $Event->setStatus('Inactivo');
            $EVENT = $Event->changeStatus();
            if ($EVENT) {
                $_SESSION['inactive'] = "exitoso";
            }
        }
        header("Location:" . baseUrl . "Events/view");
    }

    public function viewEvent()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Event = new Events();
            $Event->setIdevent($id);
            $EVENT = $Event->oneEvent();
            require('view/events/viewEvent.php');
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Event = new Events();
            $Event->setIdevent($id);
            $oneEvent = $Event->oneEvent();
            require('view/events/create.php');
        }
    }
}

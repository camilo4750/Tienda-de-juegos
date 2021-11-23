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
                $Save = $event->save();

                if ($Save) {
                    $_SESSION['save'] = "exitoso";
                }
            }
        }
        header("Location:" . baseUrl . "Events/create");
    }

    public function view()
    {
        $EVENTS = new Events();
        $EVENTS = $EVENTS->all();
        require_once('view/events/view.php');
    }
}

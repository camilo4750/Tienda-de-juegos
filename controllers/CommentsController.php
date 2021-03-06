<?php
require_once('models/Comments.php');
class CommentsController
{
    public function save()
    {
        if (isset($_POST)) {
            $Comment = new Comments();
            $Comment->setComment($_POST['comment']);
            $Comment->setProducts_id($_POST['Products_id']);
            $Comment->setClients_id($_POST['Clients_id']);
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $Comment->setIdcomment($id);
                $Edit = $Comment->editComment();
            } else {
                $Save = $Comment->save();
            }
            if ($Save) {
                $_SESSION['save'] = "exitoso";
            }
            if ($Edit) {
                $_SESSION['edit'] = "exitoso";
            }
        }
        header("Location:" .  baseUrl . "Products/seeProduct&id=" . $_POST['Products_id']);
    }

    public function delete()
    {
        if (isset($_GET['id']) && isset($_GET['product'])) {
            $id = $_GET['id'];
            $product = $_GET['product'];
            $deleteComment = new Comments();
            $deleteComment->setIdcomment($id);
            $Delete = $deleteComment->deleteComment();
            if ($Delete) {
                $_SESSION['delete'] = "exitoso";
            }
        }
        header("Location:" .  baseUrl . "Products/seeProduct&id=" . $product);
    }

    public function deleteAdmin()
    {
        utilities::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $deleteComment = new Comments();
            $deleteComment->setIdcomment($id);
            $Delete = $deleteComment->deleteComment();
            if ($Delete) {
                $_SESSION['delete'] = "exitoso";
            }
        }
        header("Location:" .  baseUrl . "Comments/view");
    }

    public function view()
    {
        utilities::isAdmin();
        $SeeComment = new Comments();
        $see = $SeeComment->allcommnets();
        require_once('view/comment/view.php');
    }
}

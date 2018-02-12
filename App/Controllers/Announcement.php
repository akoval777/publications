<?php
    namespace App\Controllers;
    use App\View;

    class Announcement extends Publication
    {
        protected function actionIndex()
        {
            $sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
            $type = isset($_POST['order']) ? $_POST['order'] : 'ASC';
            $this->view->title = 'Портал для публикаций';
            $this->view->announcements = \App\Models\Announcement::findAll($sort, $type);
            $this->view->display(__DIR__ . '/../templates/index.php');
        }

        protected function actionDelete()
        {
            $id = (int)$_GET['id'];
            \App\Models\Announcement::deleteById($id);
            header("Location: http://localhost/www/");
        }
        protected function actionShowAddForm()
        {
            $this->view->display(__DIR__ . '/../templates/AnnouncementForm.php');
        }
        protected function actionAdd()
        {
            $obj = new \App\Models\Announcement();
            $obj->headling = $_GET['headling'];
            $obj->text = $_GET['text'];
            $obj->date_pub = $_GET['date_pub'];
            $obj->date_rel = $_GET['date_rel'];
            $obj->insert();
            header("Location: http://localhost/www/announcement/");
        }
    }
     
?>
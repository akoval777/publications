<?php
    namespace App\Controllers;
    use App\View;

    class News extends Publication
    {
        protected function actionIndex()
        {
            $sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
            $type = isset($_POST['order']) ? $_POST['order'] : 'ASC';
            $this->view->title = 'Портал для публикаций';
            $this->view->news = \App\Models\News::findAll($sort, $type);
            $this->view->display(__DIR__ . '/../templates/index.php');
        }

        protected function actionShowAddForm()
        {
            $this->view->display(__DIR__ . '/../templates/NewsForm.php');
        }

        protected function actionAdd()
        {
            $obj = new \App\Models\News();
            $obj->headling = $_GET['headling'];
            $obj->text = $_GET['text'];
            $obj->date = $_GET['date'];
            $obj->source = $_GET['source'];
            $obj->insert();
            header("Location: http://localhost/www/news/");
        }
    }
     
?>
<?php
    namespace App\Controllers;
    use App\View;

    class Article extends Publication
    {
        protected function actionIndex()
        {
            $sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
            $type = isset($_POST['order']) ? $_POST['order'] : 'ASC';
            $this->view->title = 'Портал для публикаций';
            $this->view->articles = \App\Models\Article::findAll($sort, $type);
            $this->view->display(__DIR__ . '/../templates/index.php');
        }

        protected function actionAddRating()
        {
            $rating = (int)$_GET['rating'];
            $id = (int)$_GET['id'];
            \App\Models\Article::addRating($rating, $id);
            header("Location: http://localhost/www/");
        }
        protected function actionShowAddForm()
        {
            $this->view->display(__DIR__ . '/../templates/ArticleForm.php');
        }
        protected function actionAdd()
        {
            $obj = new \App\Models\Article();
            $obj->headling = $_GET['headling'];
            $obj->text = $_GET['text'];
            $obj->rating = 0;
            $lastId = $obj->insert();
            $arrayAuthors = explode(",", $_GET['authors']);
            for ($i=0; $i < count($arrayAuthors) ; $i++) { 
                $arrayFNS = explode(" ", trim($arrayAuthors[$i]));
                $objA = new \App\Models\Author();
                $objA->family = $arrayFNS[0];
                $objA->name = $arrayFNS[1];
                $objA->surname = $arrayFNS[2];
                $objA->id_article = $lastId;
                $objA->insert();
            }
            header("Location: http://localhost/www/article/");
        }
    }
     
?>
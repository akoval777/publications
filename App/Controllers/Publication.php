<?php
    namespace App\Controllers;
    use App\View;

    class Publication
    {
        protected $view;

        public function __construct()
        {
            $this->view = new View();
        }

        public function action($action)
        {
            $methodName = 'action' . $action;
            return $this->$methodName();
        }

        protected function actionIndex()
        {
            $sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
            $type = isset($_POST['order']) ? $_POST['order'] : 'ASC';
            $this->view->title = 'Портал для публикаций';
            $this->view->news = \App\Models\News::findAll($sort, $type);
            $this->view->announcements = \App\Models\Announcement::findAll($sort, $type);
            $this->view->articles = \App\Models\Article::findAll($sort, $type);
            $this->view->display(__DIR__ . '/../templates/index.php');
       }

    }
     
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="/www/js/app.js"></script>
    <style>
        .active {color: red;}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Портал для публикаций</h1>
        <form id="choosePub" class="form-inline form-group" action="http://localhost/www/news/showAddForm/">
            <label for="SelectP">Добавить публикацию:</label>
            <select id="SelectP" class="form-control" >
                <option selected>Новость</option>
                <option>Объявление</option>
                <option>Статья</option>
            </select>
            <button type="submit" class="btn btn-primary">Выбрать</button>
        </form>
        <div class="panel panel-info">
            <div class="panel-heading">Фильтр</div>
            <div class="panel-body">
            <a href="http://localhost/www/">Все</a><br>
            <a href="http://localhost/www/news/">Новости</a><br>
            <a href="http://localhost/www/announcement/">Объявления</a><br>
            <a href="http://localhost/www/article/">Статьи</a>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Сортировка</div>
            <div class="panel-body">
            <form method="POST">
            <div class="form-group">
            <select class="form-control" name="sort">
            <option value="headling" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'headling') echo "selected"?>>По названию</option>
            <option value="id" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'id') echo "selected"?>>По дате добавления</option>
            </select>
            </div>
            <div class="radio">
                <label><input type="radio" name="order" value="DESC" <?php if(isset($_POST['order']) && $_POST['order'] == 'DESC') echo "checked" ?>>По убыванию</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="order" value="ASC" <?php if(isset($_POST['order']) && $_POST['order'] == 'ASC') echo "checked" ?>>По возрастанию</label>
            </div>
            <button type="submit" class="btn btn-success">Показать</button>
            </form>
            </div>
        </div>

        <?php if(isset($news) && !empty($news)) : ?>

            <h2 class="text-center">Новости</h2>

            <?php foreach ($news as $newsobj) : ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><?=$newsobj->headling ?></h3>
                </div>
                <div class="panel-body">
                    <?=$newsobj->text;?>
                </div>
                <div class="label label-default">
                    Дата: <?=$newsobj->date ?>
                </div><br>
                 <div class="label label-default">
                    Источник: <?=$newsobj->source ?>
                </div>

            </div>

            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($announcements) && !empty($announcements)) : ?>

            <h2 class="text-center">Объявления</h2>

            <?php foreach ($announcements as $anobj) : ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><?=$anobj->headling ?></h3>
                </div>
                <div class="panel-body">
                    <?=$anobj->text;?>
                </div>
                <div class="label label-default">
                    Дата публикации: <?=$anobj->date_pub ?>
                </div><br>
                 <div class="label label-default">
                    Дата актуальности: <?=$anobj->date_rel ?>
                </div><br>
                <?php if ($anobj->date_rel < date("Y-m-d")) : ?>
                    <div class="label label-danger">
                    <a href="http://localhost/www/announcement/delete/?id=<?=$anobj->id?>" style="color: white">Удалить</a>
                    </div>
                <?php endif; ?>

            </div>

            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($articles) && !empty($articles)) : ?>

            <h2 class="text-center">Статьи</h2>

            <?php foreach ($articles as $articleobj) : ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><?=$articleobj->headling ?></h3>
                </div>
                <div class="panel-body">
                    <?=$articleobj->text ?>
                </div>
                <div class="label label-default">
                    Авторы: 
                    <?php
                        $array_authors = [];
                        foreach ($articleobj->author as $authorobj) {
                            $array_authors[]= "$authorobj->family $authorobj->name $authorobj->surname";
                        }
                        echo implode(", ", $array_authors);
                    ?>
                </div><br>
                 <div class="label label-default">
                    Оценка: <?=$articleobj->rating ?>
                </div>
                <form method="GET" action="http://localhost/www/article/addRating/">
                    <span>Выберите оценку: </span>
                    <input type="radio" name="rating" value="1">1
                    <input type="radio" name="rating" value="2">2
                    <input type="radio" name="rating" value="3">3
                    <input type="radio" name="rating" value="4">4
                    <input type="radio" name="rating" value="5">5
                    <input type="hidden" name="id" value="<?=$articleobj->id?>">
                    <input type="submit" value="Оценить">
                </form>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
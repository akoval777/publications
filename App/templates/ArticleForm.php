<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Добавление статьи</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

</head>
<body>
    <div class="container">
        <h1 class="text-center">Добавление статьи</h1>
        <form method="GET" action="http://localhost/www/article/add/">
            <div class="form-group">
                <label for="headling">Заголовок: </label>
                <input type="text" name="headling" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="text">Текст: </label>
                <input type="text" name="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="authors">Авторы: (ФИО через запятую) </label>
                <input type="text" id="authors" name="authors" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-default">Добавить</button>
        </form>
    </div>
</body>
</html>
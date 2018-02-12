$(document).ready(function() {
    $("#SelectP").change(function() {
        var selected = $(this).children(":selected").text();
        switch (selected) {
            case "Новость":
                $("#choosePub").attr('action', 'http://localhost/www/news/showAddForm/');
                break;
            case "Объявление":
                $("#choosePub").attr('action', 'http://localhost/www/announcement/showAddForm/');
                break;
            case "Статья":
                $("#choosePub").attr('action', 'http://localhost/www/article/showAddForm/');
                break;
        }
    });

    if (window.location.pathname == "/www/") {
        document.querySelectorAll(".panel-info a")[0].classList.add('active');
    } else if (window.location.pathname == "/www/news/") {
        document.querySelectorAll(".panel-info a")[1].classList.add('active');
    } else if (window.location.pathname == "/www/announcement/") {
        document.querySelectorAll(".panel-info a")[2].classList.add('active');
    } else if (window.location.pathname == "/www/article/") {
        document.querySelectorAll(".panel-info a")[3].classList.add('active');
    }

})
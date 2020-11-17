<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $this->page ?></title>

</head>
<body>
<header>
    <a href="/"><img src="images/logo.png" alt="logo" class="logo"></a>
    <h1><a href="/" class="name-company">Sweet Dreams</a></h1>
</header>
<main>
    <?php if ($_GET['page'] == 'admin' && $_SESSION['check']): ?>
        <nav>
            <ul>
                <li><a href="?page=admin&admin_page=add_user">Панель пользователей</a></li>
                <li><a href="?page=admin&admin_page=add_product">Добавить товар</a></li>
                <li><a href="?page=admin&admin_page=add_category">Панель категорий</a></li>
                <li><a href="?page=admin">На главную</a></li>
                <li><a href="/">Покинуть панель администратора</a></li>
            </ul>
            <h2>Категории:</h2>
            <ul>
                <li><a href="?page=admin&category=cookies">Печенье</a></li>
                <li><a href="?page=admin&category=cakes">Торты</a></li>
                <li><a href="?page=admin&category=waffles">Вафли</a></li>
                <li><a href="?page=admin&category=chocolate">Шоколад</a></li>
                <li><a href="?page=admin&category=marshmallow">Зефир</a></li>
            </ul>
        </nav>
    <?php elseif (!$_GET['page'] == 'admin') : ?>
        <nav>
            <h2>Categories:</h2>
            <ul>
                <li><a href="?category=cookies">Печенье</a></li>
                <li><a href="?category=cakes">Торты</a></li>
                <li><a href="?category=waffles">Вафли</a></li>
                <li><a href="?category=chocolate">Шоколад</a></li>
                <li><a href="?category=marshmallow">Зефир</a></li>
            </ul>
        </nav>
    <?php endif; ?>
    </nav>
    <?php if (isset($this->page)): ?>
        <?php include_once 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $this->page . '.php' ?>
    <?php endif; ?>
</main>
<footer>
    &copy; junstudio 2020
</footer>
</body>
</html>
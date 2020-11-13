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
    <h1><a href="/">Sweet Dreams</a></h1>
</header>
<main>
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
    <?php if (isset($this->page)): ?>
        <?php include_once 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $this->page . '.php' ?>
    <?php endif; ?>
</main>
<footer>
    &copy; junstudio 2020
</footer>
<?php if (isset($_SESSION['message'])): ?>
    <script>
        window.onload = function () {
            alert("<?= $_SESSION['message'] ?>");
        }
    </script>
<?php endif; ?>
</body>
</html>
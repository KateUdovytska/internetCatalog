<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title><?= $this->page ?></title>
</head>
<body>
<header>
    <h1><a href="?">Sweet Dreams</a></h1>
</header>
<main>
    <?php if (isset($this->page)): ?>
        <?php include_once 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $this->page . '.php' ?>
    <?php endif; ?>
</main>
<footer>
    &copy; junstudio 2020
</footer>
</body>
</html>
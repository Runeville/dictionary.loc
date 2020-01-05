<?php
    require_once 'functions/functions.php';
    require_once 'assets/classes/Mysql.php';

    $bd = new Mysql('enwords');



    $arr = select($bd->connect);

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/test.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700|Roboto:400,500&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Словарь</title>
</head>
<body>

    <h1>Вовин тест</h1>

    <div class="container">
            <?php $arr = $arr[array_rand($arr)]; ?>
            <?php shuffle($arr) ?>
            <?= upper(current($arr)); ?> -
            <span id="translation" class="opacity"> <?= mb_strtolower(next($arr)) ?> </span>
    </div>

    <button id="translation--btn" class="btn">Show the translation</button>
    <a href="test.php" class="btn">Next >></a>
    <br>
    <a id="return" href="index.php" class="btn"><< Return to main</a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
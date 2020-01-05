<?php
require_once 'functions/functions.php';
require_once 'assets/classes/Mysql.php';


$bd = new Mysql('enwords');

if (isset($_GET['del'])){
    $del = $_GET['del'];
    $delete = "DELETE FROM enwords WHERE word='{$del}'";
    mysqli_query($bd->connect, $delete);
    echo '<script>location="index.php"</script>';
}

//OLD METHOD
/*if (!empty($_POST['word']) and !empty($_POST['translation'])) {
    header("Location: {$_SERVER['PHP_SELF']}");
    $word = ucfirst(trim($_POST['word'], ' -'));
    $translation = mb_strtolower(trim($_POST['translation'], ' -'));
    insert($bd->connect, $word, $translation);
}*/

if(!empty($_POST['fullword'])){
	echo '<script>redirect="index.php"</script>';
	$words = explode('-', $_POST['fullword']);
	$word = ucfirst(trim($words[0]));
    $translation = trim($words[1]);
    insert($bd->connect, $word, $translation);
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700|Roboto:400,500&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Dictionary</title>
</head>
<body>

    <h1>Вовин словарь</h1>
<div class="container">
    <div class="form">
        <div class="form_item">
            <!-- OLD METHOD
			<form action="" method="post" style="margin-bottom: 30px">
                <div>The Word:</div> <input required type="text" name="word" autocomplete="off"> <br>
                <div>Translation:</div> <input required type="text" name="translation" autocomplete="off"> <br>
                <button name="add">Add</button>
            </form> -->
			<form action="" method="post">
				<div>The full Word:</div> <input required type="text" name="fullword" autocomplete="off"> <br>
				<button name="add">Add</button>
			</form>

        </div>

        <div class="form_item">
            <a href="test.php" class="btn">Let's get a practise</a>
        </div>
    </div>
</div>

<hr>

<div class="container">
    <?php foreach (select($bd->connect) as $item): ?>
            <?= $item['word'] ?> -
            <i><?= $item['translation']?></i>
            <a class="delete--btn" href="?del=<?= $item['word']?>">Delete</a>
            <hr>
        <?php endforeach; ?>
</div>


</body>
</html>

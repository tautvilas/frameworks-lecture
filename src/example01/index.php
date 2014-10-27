<?php
$db = new SQLite3("db/blog.sqlite");

if (isset($_POST['post']) && $_POST['post']) {
    $statement = $db->prepare('INSERT INTO `POST` (text) VALUES (:text)');
    $statement->bindValue(':text', $_POST['post'], SQLITE3_TEXT);
    $result = $statement->execute();
//    $db->exec('INSERT INTO post (text) VALUES ("'.$_POST['post'].'")');
    header("Location: .");
}

$posts = $db->query('SELECT * FROM `POST`');

?>

<!doctype html>
<html>
<head>
  <title>Blog example</title>
</head>
<body>
<form method="post">
  <label for="post">Enter new post:</label><br />
  <textarea id="post" name="post" cols="30" rows="8"></textarea><br />
  <button type="submit">Save</button>
</form>
<hr />
<? while($row = $posts->fetchArray()): ?>
  <?=$row['text'] ?><hr />
<? endwhile ?>
</body>
</html>

<?php

$db->close();

?>

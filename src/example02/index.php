<?php
$db = new SQLite3("db/blog.sqlite");

if (isset($_POST['post']) && $_POST['post']) {
    $statement = $db->prepare('INSERT INTO `POST` (text) VALUES (:text)');
    $statement->bindValue(':text', $_POST['post'], SQLITE3_TEXT);
    $result = $statement->execute();
    header("Location: .");
}

$posts = $db->query('SELECT * FROM `POST`');

include_once("view.php");

$db->close();

?>

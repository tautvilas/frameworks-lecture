<?php

$db = new SQLite3("db/blog.sqlite");

$db->exec('DROP TABLE IF EXISTS post');

$db->exec('CREATE TABLE post (text varchar(255))');

$db->exec('INSERT INTO post (text) VALUES ("Today was a good day.")');

$db->exec('INSERT INTO post (text) VALUES ("Today was a bad day.")');

$db->close();

?>

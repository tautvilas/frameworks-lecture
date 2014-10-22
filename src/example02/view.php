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

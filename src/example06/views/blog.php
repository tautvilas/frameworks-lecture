<!doctype html>
<html>
<head>
  <title>Blog example</title>
</head>
<body>
<a href="?route=main">[Go to frontpage]</a><br/>
<form method="post">
  <label for="post">Enter new post:</label><br />
  <textarea id="post" name="post" cols="30" rows="8"></textarea><br />
  <button type="submit">Save</button>
</form>
<hr />
<? while($row = $v->posts->fetchArray()): ?>
  <?=$row['text'] ?><hr />
<? endwhile ?>
</body>
</html>

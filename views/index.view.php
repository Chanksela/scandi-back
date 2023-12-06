<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>index page</h1>
<?php foreach ($products as $product) : ?>
  <li><?= $product['name']; ?></li>
<?php endforeach; ?>
</body>
</html>
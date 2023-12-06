<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>index page</h1>
<form action="/product" method="POST">
<?php foreach ($products as $product) : ?>
  <li><?= $product['name']; ?></li>
<?php endforeach; ?>
</form>
<form action="/product" method="POST">
  <input type="text" name="sku" placeholder="sku">
  <button>Test</button>
</form>
</body>
</html>
<?php require('partials/head.php'); ?>
		<main>
			<ul class="product-container">
				<?php foreach ($products as $product) : ?>
					<li class="product-box">
						<input type="checkbox" name="product" class="checkbox" id="<?= $product['id'] ?>">
						<div><?= $product['sku'] ?></div>
						<div><?= $product['name']; ?></div>
						<div><?= $product['price']; ?></div>
						<div><?= $product['parameters']?></div>
					</li>
					<?php endforeach; ?>
			</ul>
		</main>
<?php require('partials/foot.php'); ?>
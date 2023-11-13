<?php require('partials/head.php'); ?>
		<main>
			<ul>
				<?php foreach ($products as $product) : ?>
					<li>
						<?= $product['name']; ?> - <?= $product['price']; ?>
					</li>
					<?php endforeach; ?>
			</ul>
		</main>
<?php require('partials/footer.php'); ?>
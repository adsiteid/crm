<?php if (session()->has('message')) : ?>
	<div class="alert alert-success" style="font-size: small;">
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="alert alert-danger" style="font-size: small;">
		<?= session('error') ?>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<div class="alert alert-danger" style="font-size: small;">
		<?php foreach (session('errors') as $error) : ?>
			<div><?= $error ?></div>
		<?php endforeach ?>
	</div>
<?php endif ?>
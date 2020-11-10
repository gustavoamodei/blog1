
<?php if (! empty($errors)) : ?>
	<div class="alert alert-danger" role="alert">
<p>Corrigir os Seguintes Erros</p>
	<div class="errors" role="alert">
		<ul>
		<?php foreach ($errors as $error) : ?>
			<li><?= esc($error) ?></li>
		<?php endforeach ?>
		</ul>
	</div>
	</div>
<?php endif ?>



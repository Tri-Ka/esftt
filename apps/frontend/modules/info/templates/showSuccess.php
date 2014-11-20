<section class="info-paragraph col-md-8">

	<h2>Informations pratiques</h2>

	<div class="folded">

		<?php foreach ($articles as $article): ?>

			<?php include_partial('article', array('article' => $article)); ?>

		<?php endforeach; ?>

	</div>

</section>
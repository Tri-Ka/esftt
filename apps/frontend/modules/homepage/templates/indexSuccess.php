<div class="head col col-3-3">

<h1><?php echo __('Les News du CLub'); ?></h1>

</div>

<div class="articles">

    <?php if (0 < $articles->getNbResults()): ?>

        <?php foreach ($articles->getResults() as $article): ?>

			<?php include_partial('article', array('article' => $article)); ?>

		<?php endforeach; ?>

	<?php endif; ?>

	<?php if ($articles->haveToPaginate()): ?>
        <div class="pagination">
            <?php renderPagination($articles, url_for('homepage')) ?>
        </div>
    <?php endif; ?>

</div>

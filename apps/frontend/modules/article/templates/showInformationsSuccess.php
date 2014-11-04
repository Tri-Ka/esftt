<div>

	<div>

		<h1><?php echo $article->getTitle() ?></h1>

	</div>

	<div>

		<div>
			<p class="article-short"><?php echo $article->getShortDescription(); ?></p>
			<p><?php echo $article->getContent(ESC_RAW); ?></p>
		</div>

	</div>

</div>
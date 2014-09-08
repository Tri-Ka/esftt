<div class="articleDetail col-3-3">

	<div class="head head-article col col-3-3">

		<h1><?php echo $article->getTitle() ?></h1>

	</div>

	<div class="article-unit col col-3-3">

		<div class="article-content col-3-3">
			<p class="article-short"><?php echo $article->getShortDescription(); ?></p>
			<p><?php echo $article->getContent(ESC_RAW); ?></p>
		</div>

	</div>

</div>
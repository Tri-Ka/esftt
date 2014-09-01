<div class="head">

<h1><?php echo __('Les News du CLub'); ?></h1>

</div>

<div class="row articles">



    <?php if (0 < $articles->getNbResults()): ?>

        <?php foreach ($articles->getResults() as $article): ?>   

			<div class="row article span8">
				<div class="article-header">
					<h2 class="blue"><?php echo $article->getTitle(); ?></h2>
					<em class="article-date"><?php echo '|   ' . date('d-m-Y', strtotime($article->getCreatedAt())) ?></em>
					<em class="article-author"><?php echo $article->getAuthor(); ?></em>
				</div>
				
				<?php if($article->retrievePictureUrl()): ?>
					<div class="article-image span3">
						<img class="image" src="<?php echo $article->retrievePictureUrl(); ?>">
					</div>
				<?php endif; ?>
				
				<div class="article-content span4">
					<p class="article-short"><?php echo $article->getShortDescription(); ?></p><a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>"><?php echo __('suite'); ?> <i class="fa fa-angle-double-right"></i></a>
				</div>

				

				<div class="share-social">
				    <div>
				        <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>&text=<?php echo $article->getTitle(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><i class="fa fa-twitter"></i></a>
				        <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>&t=<?php echo $article->getTitle(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><i class="fa fa-facebook-square"></i></a>
				        <a target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php echo $article->getTitle(); ?>&body=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>" rel="nofollow"><i class="fa fa-envelope"></i></a>
				    </div>
				</div>

			</div>

		<?php endforeach; ?>

	<?php endif; ?>

	<?php if ($articles->haveToPaginate()): ?>
        <div class="pagination">
            <?php renderPagination($articles, url_for('homepage')) ?>
        </div>
    <?php endif; ?>

</div>

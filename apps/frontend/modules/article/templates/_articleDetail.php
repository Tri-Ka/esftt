<section class="article col-md-8">

	<h2><?php echo $article->getTitle() ?></h2>

	<div class="folded">

		<div>
			<p class="article-short"><?php echo $article->getShortDescription(); ?></p>
			<p><?php echo $article->getContent(ESC_RAW); ?></p>
		</div>

		<!-- <div class="fb-like">
			<fb:like href="<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>"></fb:like>
		</div> -->

		<div>
		    <div class="social-list">
		        <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>&text=<?php echo $article->getTitle(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><i class="social-fa fa fa-twitter"></i></a>
		        <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>&t=<?php echo $article->getTitle(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><i class="social-fa fa fa-facebook-square"></i></a>
		        <a target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php echo $article->getTitle(); ?>&body=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>" rel="nofollow"><i class="social-fa fa fa-envelope"></i></a>
		    </div>
		</div>

		<div class="date">
	    	Par <strong><?php echo $article->getAuthor(); ?></strong> le <?php echo date('d M Y', strtotime($article->getCreatedAt())) ?>
	    </div>

	</div>

	<div class="comments folded">

		<h3>Commentaires</h3>

		<div>

			<ul>

				<?php foreach ($article->getComments() as $c) : ?>

					<li class="comment">

						<?php include_partial('comment', array('comment' => $c)); ?>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php if ($sf_user->isAuthenticated()): ?>



				<form action="<?php echo url_for('new_comment'); ?>">
					<?php echo $commentForm; ?>
					<input type="submit" class="btn btn-primary" value="envoyer">
				</form>

			<?php endif; ?>

		</div>

	</div>

</section>
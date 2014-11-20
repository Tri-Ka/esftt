<div class="small-article folded">
	<h3><?php echo $article->getTitle(); ?></h3>

	<div class="article-content">
		<p><?php echo $article->getShortDescription(); ?></p>
		<a class="btn btn-xs floatright" href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>"><?php echo __('lire la suite...'); ?></a>
	</div>

    <div class="social-list">
        <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>&text=<?php echo $article->getTitle(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><i class="social-fa fa fa-twitter"></i></a>
        <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>&t=<?php echo $article->getTitle(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><i class="social-fa fa fa-facebook-square"></i></a>
        <a target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php echo $article->getTitle(); ?>&body=<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>" rel="nofollow"><i class="social-fa fa fa-envelope"></i></a>
    </div>

    <div class="date">
    	Par <strong><?php echo $article->getAuthor(); ?></strong> le <?php echo date('d M Y', strtotime($article->getCreatedAt())) ?>
    </div>

</div>
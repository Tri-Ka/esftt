<div class="comment">

	<div class="comment-header">

		<img class="comment-avatar" src="<?php echo $comment->getAuthor()->retrievePictureUrl(); ?>">
		<div class="comment-author"><?php echo $comment->getAuthor(); ?></div>
		<div class="comment-date"><?php echo date('d-m-Y h:m', strtotime($comment->getCreatedAt())); ?></div>

	</div>

	<div class="comment-content">

		<?php echo trim(nl2br($comment->getContent(ESC_RAW))); ?>

	</div>

</div>
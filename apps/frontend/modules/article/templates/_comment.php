<div class="comment-left">

	<img class="comment-avatar" src="<?php echo $comment->getAuthor()->retrievePictureUrl(); ?>">

</div>

<div class="comment-right">

	<div class="comment-header">
		<span class="comment-author"><?php echo $comment->getAuthor(); ?></span><br>
		<span class="comment-date"><?php echo date('d M Y - H:i', strtotime($comment->getCreatedAt())) ?></span>
	</div>
	<div class="comment-content">
		<?php echo trim(nl2br($comment->getContent(ESC_RAW))); ?>
	</div>

</div>
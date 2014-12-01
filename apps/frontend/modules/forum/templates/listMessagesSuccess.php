<section class="article col-md-8">
<h2><?php echo __($topic); ?></h2>

	<div class="folded comments">

		<ul>
		<?php foreach ($Messages as $m): ?>

			<li class="comment">

				<div class="comment-left">

					<img class="comment-avatar" src="<?php echo $m->getAuthor()->retrievePictureUrl(); ?>">

				</div>

				<div class="comment-right">

					<div class="comment-header">
						<span class="comment-author"><?php echo $m->getAuthor(); ?></span><br>
						<span class="comment-date"><?php echo date('d M Y - H:i', strtotime($m->getCreatedAt())) ?></span>
					</div>
					<div class="comment-content">
						<?php echo trim(nl2br($m->getMessage(ESC_RAW))); ?>
					</div>

				</div>

			</li>

		<?php endforeach; ?>

		</ul>

		<form class="form" action="">

			<?php echo $form; ?>

			<input type="submit" class="btn" value="<?php echo __('valid'); ?>">

		</form>

	</div>

</section>


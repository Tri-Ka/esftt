<div class="no-box-title text-center marged-bottom-2">
	<?php echo $topic->getTitle(); ?>
</div>

	<div class="box col-xs-12">
		<div class="box-content">
			<ul class="post-list">
				<?php foreach ($topic->getPosts() as $post): ?>
					<li>
						<div class="topic-author-part">
							<div class="autor-name"><?php echo $post->getAuthor(); ?></div>
							<div class="author-avatar">
								<img src="<?php echo $post->getAuthor()->retrievePictureUrl(); ?>">
							</div>
							<div class="author-message-count">
								Nombre de messages: <?php echo $post->getAuthor()->getPosts()->count(); ?>
							</div>
						</div>
						<div class="topic-content">
							<div class="title-topic-content">
								<span class="subtitle-post">Re: <?php echo $topic->getTitle(); ?></span>
								<span class="post-date"><?php echo format_date('D', $post->getCreatedAt()); ?></span>
							</div>
							<?php echo nl2br($post->getContent()); ?>
						</div>
						<?php if ($sf_user->getGuardUser()->hasGroup('admin')): ?>
							<a href="<?php echo url_for('post_delete', array('id' => $post->getId())); ?>" class="delete-post"><i class="fa fa-trash"></i> supprimer</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

			<form action="" method="post" class="check-empty-form">

				<?php echo $form->renderHiddenFields(); ?>

				<div class="form-group">
		 		
			 		<label><?php echo __('Votre message'); ?></label>
			 		<?php echo $form['content']->render(array('class' => 'form-control check-empty')); ?>
			 		<span class="error">veuillez renseigner ce champs</span>
				</div>	

				<input type="submit" class="btn btn-primary" value="envoyer">

			</form>

		</div>
	</div>
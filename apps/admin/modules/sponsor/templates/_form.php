<form action="" method="post" class="article-form" enctype="multipart/form-data">
	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-6">
	 	<div class="form-group">
	 		<label><?php echo __('Nom'); ?></label>
	 		<?php echo $form['name']->render(array('class' => 'form-control')); ?>
		</div>

		<div class="form-group full-label">
	 		<label><?php echo __('Illustration'); ?></label>
	 		<?php echo $form['picture']->render(); ?>
		</div>

		<div class="form-group">
	 		<label><?php echo __('Lien'); ?></label>
	 		<?php echo $form['link']->render(array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>
	</div>
</form>

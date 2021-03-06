<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-5">

	 	<div class="form-group">
	 		<label><?php echo __('Titre'); ?></label>
	 		<?php echo $form['title']->render(array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
	 		<label><?php echo __('Illustration'); ?></label>
	 		<?php echo $form['picture']->render(); ?>
		</div>

	</div>

	<div class="col-xs-12 col-sm-7">
		<div class="form-group">
	 		<label><?php echo __('Contenu'); ?></label>
	 		<?php echo $form['content']->render(array('class' => 'form-control niceEditor')); ?>
		</div>

		<div class="form-group">
	 		<label><?php echo __('Publier ?'); ?></label>
	 		<?php echo $form['is_published']->render(); ?>
		</div>
	</div>

	<div class="col-xs-12">

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>

	</div>

</form>

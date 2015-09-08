<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-6">

	 	<div class="form-group">
	 		<label><?php echo __('Titre'); ?></label>
	 		<?php echo $form['title']->render(array('class' => 'form-control')); ?>
	 		<?php echo $form['title']->renderError(); ?>
		</div>	

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>				

	</div>

</form>
<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-6">

	 	<div class="form-group">
	 		<label><?php echo __('Auteur'); ?></label>
	 		<?php echo $form['author_id']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('Topic'); ?></label>
	 		<?php echo $form['topic_id']->render(array('class' => 'form-control')); ?>
		</div>	

	</div>

	<div class="col-xs-12 col-sm-6">

		<div class="form-group">
	 		<label><?php echo __('Contenu'); ?></label>
	 		<?php echo $form['content']->render(array('class' => 'form-control')); ?>
		</div>	

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>				

	</div>

</form>
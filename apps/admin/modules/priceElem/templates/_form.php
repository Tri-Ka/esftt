<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-5">
	 	<div class="form-group">
	 		<label><?php echo __('Nom'); ?></label>
	 		<?php echo $form['element']->render(array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
	 		<label><?php echo __('Infos'); ?></label>
	 		<?php echo $form['info']->render(array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
	 		<label><?php echo __('Prix'); ?></label>
	 		<?php echo $form['price']->render(array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
	 		<label><?php echo __('Categorie'); ?></label>
	 		<?php echo $form['category_id']->render(array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="col-xs-12">
		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>
	</div>
</form>

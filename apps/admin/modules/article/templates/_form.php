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
	 		<label><?php echo __('Pitch'); ?></label>
	 		<?php echo $form['sub_title']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		
	 		<label><?php echo __('Contenu'); ?></label>
 			
 			<?php include_partial('general/toolbar'); ?>

			<div id="editor" class="textarea marged-top">
				<?php echo trim($form->getObject()->getContent(ESC_RAW)); ?>
  			</div>

	 		<?php echo $form['content']->render(array('class' => 'form-control hidden')); ?>

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
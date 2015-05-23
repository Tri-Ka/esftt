<div class="col-xs-12 col-sm-8 col-sm-offset-2">

	<div class="box">

		<div class="box-title text-center">
			<?php echo __('Nous contacter'); ?>
		</div>

		<div class="box-content marged-top">

			<form action="" method="post" class="">

				<?php echo $form->renderHiddenFields() ?>

			 	<div class="form-group">
			 		<label><?php echo __('Votre addresse mail'); ?></label>
			 		<?php echo $form['from']->render(array('class' => 'form-control')); ?>
				</div>		

				<div class="form-group">
			 		<label><?php echo __('Votre sujet'); ?></label>
			 		<?php echo $form['subject']->render(array('class' => 'form-control')); ?>
				</div>	

				<div class="form-group">
			 		<label><?php echo __('Votre message'); ?></label>
			 		<?php echo $form['content']->render(array('class' => 'form-control')); ?>
				</div>	

				<div class="form-group">
			 		<input type="submit" class="btn btn-primary" value="envoyer">
				</div>				

			</form>

		</div>

	</div>

</div>
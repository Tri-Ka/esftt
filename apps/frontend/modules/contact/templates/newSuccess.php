<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
		<div class="no-box-title text-center marged-bottom">
			<?php echo __('Nous contacter'); ?>
		</div>

		<div class="box">
			<div class="box-content marged-top">
				<form action="" method="post" class="">
					<?php echo $form->renderHiddenFields() ?>

				 	<div class="form-group  <?php echo true == $form['from']->hasError() ? 'has-error' : ''; ?>">
				 		<label><?php echo __('Votre addresse mail'); ?></label>
				 		<?php echo $form['from']->renderError(); ?>
				 		<?php echo $form['from']->render(array('class' => 'form-control')); ?>
					</div>

					<div class="form-group <?php echo true == $form['subject']->hasError() ? 'has-error' : ''; ?>">
				 		<label><?php echo __('Votre sujet'); ?></label>
				 		<?php echo $form['subject']->renderError(); ?>
				 		<?php echo $form['subject']->render(array('class' => 'form-control')); ?>
					</div>

					<div class="form-group  <?php echo true == $form['content']->hasError() ? 'has-error' : ''; ?>">
				 		<label><?php echo __('Votre message'); ?></label>
				 		<?php echo $form['content']->renderError(); ?>
				 		<?php echo $form['content']->render(array('class' => 'form-control')); ?>
					</div>

					<div class="form-group">
						<div class="text-right">
							<button type="submit" class="btn btn-primary">
				 				<?php echo __('envoyer'); ?> <i class="fa fa-paper-plane"></i>
				 			</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include_partial('private/menu', array('active' => 'account')); ?>

	<div class="col-xs-12 col-sm-8">

		<div class="no-box-title text-center marged-bottom">
			<?php echo __('Mon compte'); ?>
		</div>

		<div class="box text-center">
			<div class="box-title">

				<img src="<?php echo $user->retrievePictureUrl(); ?>" class="img-circle img-thumbnail" width="80px"><br>
				<?php echo $user->getUsername(); ?>

			</div>
			<div class="box-content marged-top">
				<form action="" method="post" enctype="multipart/form-data">
					
				<?php echo $form->renderHiddenFields(); ?>

					<div class="col-xs-12 col-sm-6">

						<div class="form-group">
					 		<label><?php echo __('Nom'); ?></label>
					 		<?php echo $form['last_name']->renderError(); ?>
					 		<?php echo $form['last_name']->render(array('class' => 'form-control')); ?>
						</div>	

					</div>
					<div class="col-xs-12 col-sm-6">

						<div class="form-group">
					 		<label><?php echo __('Prénom'); ?></label>
					 		<?php echo $form['first_name']->renderError(); ?>
					 		<?php echo $form['first_name']->render(array('class' => 'form-control')); ?>
						</div>	

					</div>
					<div class="col-xs-12">

						<div class="form-group">
					 		<label><?php echo __('E-mail'); ?></label>
					 		<?php echo $form['email_address']->renderError(); ?>
					 		<?php echo $form['email_address']->render(array('class' => 'form-control')); ?>
						</div>	

					</div>
					<div class="col-xs-12 col-sm-6">

					 	<div class="form-group">
					 		<label><?php echo __('Pseudo'); ?></label>
					 		<?php echo $form['username']->renderError(); ?>
					 		<?php echo $form['username']->render(array('class' => 'form-control')); ?>
						</div>

					</div>
					<div class="col-xs-12 col-sm-6">	

						<div class="form-group">
					 		<label><?php echo __('N° licence FFTT'); ?></label>
					 		<?php echo $form['licence']->renderError(); ?>
					 		<?php echo $form['licence']->render(array('class' => 'form-control')); ?>
						</div>
					</div>

					<div class="col-xs-12">	

						<div class="form-group">
					 		<label><?php echo __('Avatar'); ?></label>
					 		<?php echo $form['avatar']->render(); ?>
						</div>	

					</div>

					<div class="col-xs-12 col-sm-6">

						<div class="form-group">
					 		<label><?php echo __('Password'); ?></label>
					 		<?php echo $form['password']->renderError(); ?>
					 		<?php echo $form['password']->render(array('class' => 'form-control')); ?>
						</div>	

					</div>
					<div class="col-xs-12 col-sm-6">

						<div class="form-group">
					 		<label><?php echo __('Répeter password'); ?></label>
					 		<?php echo $form['password_again']->renderError(); ?>
					 		<?php echo $form['password_again']->render(array('class' => 'form-control')); ?>
						</div>		

					</div>

					<input type="submit" value="sauvegarder" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</div>
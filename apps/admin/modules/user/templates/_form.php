<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-6">

		<div class="form-group">
	 		<label><?php echo __('avatar'); ?></label>
	 		<?php echo $form['avatar']->render(); ?>
		</div>	

	 	<div class="form-group">
	 		<label><?php echo __('username'); ?></label>
	 		<?php echo $form['username']->renderError(); ?>
	 		<?php echo $form['username']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('email_address'); ?></label>
	 		<?php echo $form['email_address']->renderError(); ?>
	 		<?php echo $form['email_address']->render(array('class' => 'form-control')); ?>
		</div>	

	</div>

	<div class="col-xs-12 col-sm-6">

		<div class="form-group">
	 		<label><?php echo __('password'); ?></label>
	 		<?php echo $form['password']->renderError(); ?>
	 		<?php echo $form['password']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('password_again'); ?></label>
	 		<?php echo $form['password_again']->renderError(); ?>
	 		<?php echo $form['password_again']->render(array('class' => 'form-control')); ?>
		</div>		

		<div class="form-group">
	 		<label><?php echo __('groupes'); ?></label>
	 		<?php echo $form['groups_list']->renderError(); ?>
	 		<?php echo $form['groups_list']->render(array('class' => 'form-control')); ?>
		</div>	

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>				

	</div>
</form>
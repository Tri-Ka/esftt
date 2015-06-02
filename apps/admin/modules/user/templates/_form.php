<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-6">

		<div class="form-group">
	 		<label><?php echo __('Avatar'); ?></label>
	 		<?php echo $form['avatar']->render(); ?>
		</div>	

	 	<div class="form-group">
	 		<label><?php echo __('Pseudo'); ?></label>
	 		<?php echo $form['username']->renderError(); ?>
	 		<?php echo $form['username']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('E-mail'); ?></label>
	 		<?php echo $form['email_address']->renderError(); ?>
	 		<?php echo $form['email_address']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('Nom'); ?></label>
	 		<?php echo $form['last_name']->renderError(); ?>
	 		<?php echo $form['last_name']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('Prénom'); ?></label>
	 		<?php echo $form['first_name']->renderError(); ?>
	 		<?php echo $form['first_name']->render(array('class' => 'form-control')); ?>
		</div>	

	</div>

	<div class="col-xs-12 col-sm-6">

		<div class="form-group">
	 		<label><?php echo __('Password'); ?></label>
	 		<?php echo $form['password']->renderError(); ?>
	 		<?php echo $form['password']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('Répeter password'); ?></label>
	 		<?php echo $form['password_again']->renderError(); ?>
	 		<?php echo $form['password_again']->render(array('class' => 'form-control')); ?>
		</div>		

		<div class="form-group">
	 		<label><?php echo __('Groupes'); ?></label>
	 		<?php echo $form['groups_list']->renderError(); ?>
	 		<?php echo $form['groups_list']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('Equipes'); ?></label>
	 		<?php echo $form['teams_list']->renderError(); ?>
	 		<?php echo $form['teams_list']->render(array('class' => 'form-control')); ?>
		</div>	

		<div class="form-group">
	 		<label><?php echo __('N° licence FFTT'); ?></label>
	 		<?php echo $form['licence']->renderError(); ?>
	 		<?php echo $form['licence']->render(array('class' => 'form-control')); ?>
		</div>

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>				

	</div>
</form>
<div class="col-xs-12 col-sm-4 col-sm-offset-4 animated flipInX">
    <div class="box">
    	<div class="box-content">
			<h2><?php echo __('Nouveau mot de passe'); ?></h2>

			<p><?php echo __('Bonjour %name%', array('%name%' => $user->getName()), 'sf_guard') ?></p>
			<p><?php echo __('Entrer votre nouveau mot de passe ci dessous.', null, 'sf_guard') ?></p>

			<form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
				<?php echo $form->renderHiddenFields() ?>

				<div class="form-group">
		            <?php echo $form['password']->renderError() ?>
		            <?php echo $form['password']->render(array('class' => 'form-control', 'placeholder' => __('Nouveau mot de passe'))) ?>
		        </div>

		        <div class="form-group">
		            <?php echo $form['password_again']->renderError() ?>
		            <?php echo $form['password_again']->render(array('class' => 'form-control', 'placeholder' => __('Répéter'))) ?>
		        </div>

		        <div class="form-group">
		            <input type="submit" class="btn btn-primary" name="change" value="<?php echo __('Modifier mon mot de passe'); ?>">
		        </div>
			</form>
		</div>
	</div>
</div>

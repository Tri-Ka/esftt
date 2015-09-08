<div class="col-xs-12 col-sm-6 col-sm-offset-2 animated flipInX">

    <div class="box">

    	<div class="box-content">

			<?php use_helper('I18N') ?>
			<h2><?php echo __('Forgot your password?', null, 'sf_guard') ?></h2>

			<p>
			  <?php echo __('Pas de panique, on va vous aider!', null, 'sf_guard') ?><br>
			  <?php echo __('Entrez votre adresse e-mail, et vous receverez un mail qui vous indiquera la marche à suivre pour avoir un nouveau mot de pass.', null, 'sf_guard') ?>
			</p>

			<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">

				<?php echo $form->renderHiddenFields() ?>
	                
	            <div class="form-group">
	                <?php echo $form['email_address']->renderError() ?>
	                <?php echo $form['email_address']->render(array('class' => 'form-control', 'placeholder' => __('adresse mail'))) ?>
	            </div>

	            <div class="form-group">
	                <input type="submit" class="btn btn-primary" value="<?php echo __('Valider') ?>">
	            </div>

			</form>

		</div>

	</div>

</div>
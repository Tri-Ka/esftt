<?php use_helper('I18N') ?>
<?php echo __('Bonjour %first_name%', array('%first_name%' => $user->getFirstName()), 'sf_guard') ?>,<br/><br/>

<?php echo __('Cet e-mail vous a été envoyé, car vous souhaitez réinitialiser votre mot de passe.', null, 'sf_guard') ?><br/><br/>

<?php echo __('Vous pouvez le modifier en cliquant sur le lien suivant:', null, 'sf_guard') ?><br/><br/>

<?php echo link_to(__('Changer son mot de passe', null, 'sf_guard'), '@sf_guard_forgot_password_change?unique_key='.$forgot_password->unique_key, 'absolute=true') ?>

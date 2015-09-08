<div class="col-xs-12 col-sm-4 col-sm-offset-4 animated flipInX">

    <div class="box">

        <div class="box-title">
            <?php echo __('Connexion'); ?>
        </div>

        <div class="box-content marged-top">

            <form action="<?php echo isset($actionForm) ? $actionForm : url_for('@sf_guard_signin') ?>" method="post">
                
                <?php echo $form->renderHiddenFields() ?>
                
                <div class="form-group">
                    <?php echo $form['username']->renderError() ?>
                    <?php echo $form['username']->render(array('class' => 'form-control', 'placeholder' => __('Username or email'))) ?>
                </div>

                <div class="form-group">
                    <?php echo $form['password']->renderError() ?>
                    <?php echo $form['password']->render(array('class' => 'form-control', 'placeholder' => __('Password'))) ?>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="<?php echo __('Se connecter') ?>">
                        
                    <!-- <a href="<?php echo url_for('sf_guard_forgot_password') ?>" class="btn btn-default">
                        <?php echo __('Mot de passe oublié ?') ?>
                    </a> -->
                </div>
            </form>
        </div>
    </div>
</div>
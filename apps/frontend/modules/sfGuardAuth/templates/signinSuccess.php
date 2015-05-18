<?php slot('page_title',  'imagine with orange' . ' - ' . __('Login')); ?>
<?php slot('page_description', __('Share your ideas, Orange is helping you to give them life')); ?>

<section id="signin">
    <h1 class="h1">
        <?php echo __('Login with your OOI account') ?>
    </h1>

    <form action="<?php echo isset($actionForm) ? $actionForm : url_for('@sf_guard_signin') ?>" method="post" class="connexion-form clearfix">

        <?php echo $form->renderHiddenFields() ?>

        <p>
            <?php echo $form['username']->renderError() ?>
            <?php echo $form['username']->render(array('placeholder' => __('Username or email'))) ?>
        </p>
        <p>
            <?php echo $form['password']->renderError() ?>
            <?php echo $form['password']->render(array('placeholder' => __('Password'))) ?>
        </p>

        <button type="submit" class="btn full primary med">
            <?php echo __('Login') ?>
        </button>

        <a href="<?php echo url_for('sf_guard_forgot_password') ?>" class="forgot">
            <?php echo __('Forgot password ?') ?>
        </a>

        <input type="hidden" name="redirectUrl" value="<?php echo isset($redirectUrl) ? $redirectUrl : ''; ?>">

    </form>

    <ul class="social">
        <li>
            <a class="clearfix btn blankary full med with-icon" href="<?php echo url_for('sf_guard_signin_hybrid_profile', array('provider' => 'Facebook')) ?>" title="<?php echo __('Login with Facebook') ?>">
                <i class="fa fa-facebook"></i>
                <span><?php echo __('Login with Facebook') ?></span>
            </a>
        </li>
        <li>
            <a class="clearfix btn blankary full med with-icon" href="<?php echo url_for('sf_guard_signin_hybrid_profile', array('provider' => 'Twitter')) ?>" title="<?php echo __('Login with Twitter') ?>">
                <i class="fa fa-twitter"></i>
                <span><?php echo __('Login with Twitter') ?></span>
            </a>
        </li>
        <li>
            <a class="clearfix btn blankary full med with-icon" href="<?php echo url_for('sf_guard_signin_hybrid_profile', array('provider' => 'LinkedIn')) ?>" title="<?php echo __('Login with LinkedIn') ?>">
                <i class="fa fa-linkedin"></i>
                <span><?php echo __('Login with LinkedIn') ?></span>
            </a>
        </li>
    </ul>

</section>

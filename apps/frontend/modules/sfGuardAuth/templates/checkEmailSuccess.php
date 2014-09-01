<section id="signin">
    <h1 class="h1">
        <?php echo __('Login with your OOI account') ?>
    </h1>

    <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="connexion-form clearfix">

        <?php echo $form->renderHiddenFields() ?>

        <p>
            <?php echo $form['username']->renderError() ?>
            <?php echo $form['username']->render(array('placeholder' => __('Username or email'))) ?>
        </p>
        <p>
            <?php echo $form['password']->renderError() ?>
            <?php echo $form['password']->render(array('placeholder' => __('Password'))) ?>
        </p>

        <button type="submit" class="btn full greyary med">
            <?php echo __('Login') ?>
        </button>

        <a href="<?php echo url_for('sf_guard_forgot_password') ?>" class="forgot">
            <?php echo __('Forgot password ?') ?>
        </a>

    </form>

    <ul class="social">
        <li>
            <a class="clearfix btn blankary full med" href="<?php echo url_for('sf_guard_signin_hybrid_profile', array('provider' => 'Facebook')) ?>" title="<?php echo __('Login with Facebook') ?>">
                <i class="fb"></i>
                <span><?php echo __('Login with Facebook') ?></span>
            </a>
        </li>
        <li>
            <a class="clearfix btn blankary full med" href="<?php echo url_for('sf_guard_signin_hybrid_profile', array('provider' => 'Twitter')) ?>" title="<?php echo __('Login with Twitter') ?>">
                <i class="twitter"></i>
                <span><?php echo __('Login with Twitter') ?></span>
            </a>
        </li>
        <li>
            <a class="clearfix btn blankary full med" href="<?php echo url_for('sf_guard_signin_hybrid_profile', array('provider' => 'LinkedIn')) ?>" title="<?php echo __('Login with LinkedIn') ?>">
                <i class="in"></i>
                <span><?php echo __('Login with LinkedIn') ?></span>
            </a>
        </li>
    </ul>

</section>

<aside class="col-md-4">

    <h2>Bienvenue</h2>

    <div class="folded">

    <?php if($sf_user->isAuthenticated()): ?>

        <div class="userBox">

            <img class="avatar img-circle" alt="User avatar" src="<?php echo $sf_user->getGuardUser()->retrievePictureUrl()?>">
            <span class="username"><?php echo $sf_user->getGuardUser(); ?></span>
            <a class="signout btn btn-xs btn-primary" href="<?php echo url_for('sf_guard_signout'); ?>"><i class="fa fa-power-off"></i> <?php echo ('se déconnecter'); ?></a>
        </div>

    <?php else: ?>

        <form class="form connect-form" role="form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

            <?php echo $form; ?>

            <button type="submit" class="btn btn-default"><?php echo __('Se connecter'); ?></button>
            <a class="signin btn btn-small" href="<?php echo url_for('user_create'); ?>">s'inscrire</a>
        </form>

    <?php endif; ?>

    </div>

</aside>


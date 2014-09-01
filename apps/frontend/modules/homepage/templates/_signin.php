<?php if($sf_user->isAuthenticated()): ?>
    
    <div class="user-info span3 hidden-phone">

        <img class="avatar" alt="User avatar" src="<?php echo $sf_user->getGuardUser()->retrievePictureUrl()?>">
        <span class="welcome">Bienvenue</span>
        <span class="username"><?php echo $sf_user->getGuardUser(); ?></span>
        <a class="signout btn btn-mini" href="<?php echo url_for('sf_guard_signout'); ?>"><i class="fa fa-power-off"></i>se déconnecter</a>
    </div>

<?php else: ?>

    <form class="form login" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        
        <?php echo $form->renderHiddenFields() ?>
        
        <ul>
            
            <li>
                <?php echo $form['username']->renderError() ?>
                <?php echo $form['username']->render() ?>
            </li>

            <li>
                <?php echo $form['password']->renderError() ?>
                <?php echo $form['password']->render() ?>
            </li>
            
        </ul>

        <input type="submit" class="btn btn-small blue" value="se connecter">
        <a class="signin btn btn-small" href="<?php echo url_for('user_create'); ?>">s'inscrire</a>


    </form>

<?php endif; ?>

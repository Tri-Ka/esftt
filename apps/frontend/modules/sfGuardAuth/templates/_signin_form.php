<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

    <?php echo $form->renderHiddenFields() ?>

    <ul>

        <li>
            <?php echo $form['username']->renderError() ?>
            <?php echo $form['username']->renderLabel('Login') ?>
            <?php echo $form['username']->render() ?>
        </li>

        <li>
            <?php echo $form['password']->renderError() ?>
            <?php echo $form['password']->renderLabel('Mot de passe') ?>
            <?php echo $form['password']->render() ?>
        </li>
        <li>
            <?php echo $form['remember']->renderError() ?>
            <?php echo $form['remember']->renderLabel('Se souvenir de moi') ?>
            <?php echo $form['remember']->render() ?>
        </li>

    </ul>

</form>

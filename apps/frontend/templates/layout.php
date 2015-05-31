<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico" />
    </head>
    <body>

        <header>
            <div class="container-fluid">
                <div class="container">
                    <nav class="navbar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="visible-xs visible-lg"><a href="<?php echo url_for('homepage'); ?>" class="hvr-bounce-to-top">Accueil</a></li>
                                <li><a href="<?php echo url_for('club'); ?>" class="hvr-bounce-to-top">Le Club</a></li>
                                <li><a href="<?php echo url_for('gallery'); ?>" class="hvr-bounce-to-top">Gallerie</a></li>
                                <li><a href="<?php echo url_for('infos'); ?>" class="hvr-bounce-to-top">Infos</a></li>
                                <li><a href="<?php echo url_for('contact'); ?>" class="hvr-bounce-to-top">Contact</a></li>
                            </ul>
                            <ul class="nav navbar-nav social-nav">
                                <li><a href="#" class="facebook hvr-bounce-in"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter hvr-bounce-in"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                    <a id="logo" href="<?php echo url_for('homepage'); ?>">
                        <img src="<?php echo public_path('images/logo.png'); ?>">
                    </a>

                </div>

            </div>
        </header>

        <div id="main-container" class="container-fluid">

            <?php if ($sf_user->hasFlash('notice')): ?>
                <div class="flash notice">
                    <?php echo $sf_user->getFlash('notice') ?>
                </div>
            <?php endif ?>

            <?php if ($sf_user->hasFlash('error')): ?>
                <div class="flash error">
                    <?php echo $sf_user->getFlash('error') ?>
                </div>
            <?php endif ?>

            <?php if ('homepage' == $sf_params->get('module')): ?>

                <div class="row slider-full">

                    <?php include_component('homepage', 'slider'); ?>

                </div>

            <?php endif; ?>

            <div class="container">

                <?php echo $sf_content ?>

            </div>

        </div>

        <footer>
            <div class="container-fluid">
                <div class="container">

                    <div class="col-xs-12 col-sm-4">

                        <ul class="links">
                            <li>
                                <a target="blank" href="http://www.fftt.com/">site de la fédération</a>
                            </li>
                            <li>
                                <a target="blank" href="http://www.tennis-de-table.com/">tennis-de-table.com</a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-xs-12 col-sm-4">

                    </div>

                    <div class="col-xs-12 col-sm-4">

                    </div>

                    <div class="col-xs-12 text-center">
                        <span class="small">© ESFTT <?php echo date('Y'); ?> - Tous droits réservés</span>
                    </div>

                </div>
            </div>
        </footer>

    </body>


    <?php include_javascripts() ?>

</html>

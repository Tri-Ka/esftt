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

       <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url_for('homepage'); ?>">Admin ESFTT</a>
                    <a class="go-to-front-url" href="<?php echo sfConfig::get('app_front_url'); ?>">Aller vers le site</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $sf_user->getGuardUser(); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo url_for('sf_guard_logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">
                    <ul class="nav navbar-nav side-nav" id="sidebar-menu">
                        <li class="<?php echo 'homepage' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('homepage'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="<?php echo 'user' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('user_list'); ?>"><i class="fa fa-fw fa-users"></i> Utilisateurs</a>
                        </li>
                        <li class="<?php echo 'article' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('article_list'); ?>"><i class="fa fa-fw fa-newspaper-o"></i> Articles</a>
                        </li>
                        <li class="<?php echo 'team' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('team_list'); ?>"><i class="fa fa-fw fa-star-o"></i> Teams</a>
                        </li>
                        <li class="<?php echo 'event' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('event_list'); ?>"><i class="fa fa-calendar"></i> Evènements</a>
                        </li>
                        <li class="<?php echo 'forum' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('forum'); ?>"><i class="fa fa-bullhorn"></i> Forum</a>
                        </li>
                        <li class="<?php echo 'file' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('file_list'); ?>"><i class="fa fa-file"></i> Fichiers</a>
                        </li>
                        <li class="<?php echo 'cover' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('cover_list'); ?>"><i class="fa fa-picture-o"></i> Images de couverture</a>
                        </li>
                        <li class="<?php echo 'sponsor' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('sponsor_list'); ?>"><i class="fa fa-star"></i> Sponsors</a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="">
                                <i class="fa fa-clock-o"></i>
                                <span>Horaires</span>
                                <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul style="display: none;">
                                <li class="<?php echo 'scheduleCat' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                                    <a href="<?php echo url_for('schedule_cat_list'); ?>">Catégorie</a>
                                </li>

                                <li class="<?php echo 'scheduleDay' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                                    <a href="<?php echo url_for('schedule_day_list'); ?>">Jour</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="">
                                <i class="fa fa-money"></i>
                                <span>Tarifs</span>
                                <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul style="display: none;">
                                <li class="<?php echo 'priceCat' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                                    <a href="<?php echo url_for('price_cat_list'); ?>">Catégorie</a>
                                </li>

                                <li class="<?php echo 'priceElem' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                                    <a href="<?php echo url_for('price_elem_list'); ?>">Tarifs</a>
                                </li>
                            </ul>
                        </li>

                        <li class="<?php echo 'infoElem' == $sf_context->getModuleName() ? 'active' : ''; ?>">
                            <a href="<?php echo url_for('info_elem_list'); ?>"><i class="fa fa-info"></i> Autres informations</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php if ($sf_user->hasFlash('notice')) : ?>
                        <div class="flash notice">
                            <?php echo $sf_user->getFlash('notice') ?>
                        </div>
                    <?php endif ?>

                    <?php if ($sf_user->hasFlash('error')) : ?>
                        <div class="flash error">
                            <?php echo $sf_user->getFlash('error') ?>
                        </div>
                    <?php endif ?>

                    <?php echo $sf_content; ?>
                </div>
            </div>
        </div>
    </body>

    <?php include_javascripts() ?>

    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas({fullPanel : true}));</script>
</html>

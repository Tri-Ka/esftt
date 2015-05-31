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
                    <ul class="nav navbar-nav side-nav">
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
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <?php echo $sf_content; ?>

                </div>

            </div>

        </div>

    </body>


    <?php include_javascripts() ?>

</html>

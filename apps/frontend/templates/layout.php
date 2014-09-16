<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <div class="container">

    <header class="">

      <img src="<?php echo public_path('/images/header.png') ?>">
    </header>

      <!-- Barre de navigation -->
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <!-- Bouton apparaissant sur les résolutions mobiles afin de faire apparaître le menu de navigation -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <!-- Structure du menu -->
          <div class="nav-collapse collapse">
            <ul class="nav">

              <li><a href="<?php echo url_for('homepage'); ?>"><i class="fa fa-home"></i>Accueil</a></li>
              <li><a href="<?php echo url_for('gallery_list'); ?>"><i class="fa fa-picture-o"></i>Photos</a></li>
              <li><a href="<?php echo url_for('informations'); ?>"><i class="fa fa-info"></i>Informations</a></li>
              <li><a href="#"><i class="fa fa-calendar-o"></i>Résultats</a></li>
              <li><a href="<?php echo url_for('forum'); ?>"><i class="fa fa-group"></i>Forum</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>Contact</a></li>
              <?php if ($sf_user->isAuthenticated()): ?>
                <li class="visible-phone"><a href="<?php echo url_for('sf_guard_signout'); ?>"><i class="fa fa-power-off"></i>se déconnecter</a></li>
              <?php endif; ?>
            </ul>

          </div>
        </div>
      </div>

      <div class="">

        <div class="col col-1-4 floatleft">

          <?php include_component('homepage', 'signin'); ?>

        </div>

        <div class="col col-3-4 floatright maincontent">
          <?php echo $sf_content ?>
        </div>

      </div>

      <?php include_partial('global/footer') ?>

    </div>

  </body>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</html>

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
              <li><a href="#"><i class="fa fa-info"></i>Informations</a></li>
              <li><a href="#"><i class="fa fa-calendar-o"></i>Résultats</a></li>
              <li><a href="#"><i class="fa fa-group"></i>Forum</a></li>
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

        <footer class="col col-3-3">

          <div class="col col-1-3">
            <h2>Liens</h2>
              <ul>
                <li><a href="http://www.fftt.com" class="style8">le site de la fédération </a></li>
                <li><a href="http://perso.wanadoo.fr/fftt.idf/" class="style8">le site de l ile de france </a></li>
                <li><a href="http://perso.wanadoo.fr/fftt.cd95tt/" class="style8">le site du département </a></li>
                <li><a href="http://www.tennis-de-table.com" class="style8">tennisdetable.com</a></li>
              </ul>
          </div>

          <div class="col col-1-3">

            <h2>Sponsors</h2>
            <ul id="sponsor-list">
              <li><a href="#" class="style8"><img src="http://placehold.it/250x55" class="img-rounded"></a></li>
              <li><a href="#" class="style8"><img src="http://placehold.it/250x55" class="img-rounded"></a></li>
              <li><a href="#" class="style8"><img src="http://placehold.it/250x55" class="img-rounded"></a></li>
              <li><a href="#" class="style8"><img src="http://placehold.it/250x55" class="img-rounded"></a></li>
            </ul>

          </div>

          <div class="col col-1-3">

            <h2>Adresse</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, ...
            </p>
            <address>
              <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
            <address>
              <strong>Full Name</strong><br>
              <a href="mailto:#">first.last@gmail.com</a>
            </address>
            <p><a class="btn" href="#">En savoir plus <i class="icon-chevron-right"></i></a></p>
          </div>

        </footer>

    </div>

  </body>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</html>

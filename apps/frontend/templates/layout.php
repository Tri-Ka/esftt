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

    <?php include_partial('global/header') ?>

    <section class="content container">

      <div class="animated">
        <?php echo $sf_content ?>
      </div>

      <div class="animated">
        <?php include_component('homepage', 'signin'); ?>
      </div>

    </section>

    <?php include_partial('global/footer') ?>

  </body>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</html>

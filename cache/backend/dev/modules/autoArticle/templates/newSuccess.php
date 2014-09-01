<?php use_helper('I18N', 'Date') ?>
<?php include_partial('article/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Article', array(), 'messages') ?></h1>

  <?php include_partial('article/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('article/form_header', array('article' => $article, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('article/form', array('article' => $article, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('article/form_footer', array('article' => $article, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

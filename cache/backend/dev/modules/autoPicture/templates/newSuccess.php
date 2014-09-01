<?php use_helper('I18N', 'Date') ?>
<?php include_partial('picture/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Picture', array(), 'messages') ?></h1>

  <?php include_partial('picture/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('picture/form_header', array('picture' => $picture, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('picture/form', array('picture' => $picture, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('picture/form_footer', array('picture' => $picture, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

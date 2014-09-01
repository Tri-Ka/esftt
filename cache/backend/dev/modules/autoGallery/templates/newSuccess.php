<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gallery/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Gallery', array(), 'messages') ?></h1>

  <?php include_partial('gallery/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('gallery/form_header', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('gallery/form', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('gallery/form_footer', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

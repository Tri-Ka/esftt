<div class="col-xs-12 col-sm-6">
  <div class="thumbnail">
    <img class="" width="100%" src="<?php echo $event->retrievePictureUrl(); ?>" alt="...">
    <div class="caption">
      <h3><?php echo $event; ?></h3>
      <p><?php echo $event->getDescription(); ?></p>
      <p><a href="#" class="btn btn-primary" role="button"><?php echo __('détails'); ?></a></p>
    </div>
  </div>
</div>
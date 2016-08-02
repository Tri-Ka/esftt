<a href="<?php echo url_for('event_show', array('id' => $event->getId())); ?>" class="hvr-grow-rotate col-xs-12 col-sm-4 text-center grid-item">
    <div class="thumbnail  shadowed">
        <img class="" width="100%" src="<?php echo $event->retrievePictureUrl(); ?>" alt="...">
        <div class="caption">
            <strong><?php echo $event; ?></strong>
        </div>
    </div>
</a>

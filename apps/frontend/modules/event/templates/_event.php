<a href="<?php echo url_for('event_show', array('id' => $event->getId())); ?>" class="hvr-grow col-xs-12 col-sm-6 text-center">
    <div class="thumbnail shadowed">
        <img class="" width="100%" src="<?php echo $event->retrievePictureUrl(); ?>" alt="...">
        <div class="caption">
            <h3><?php echo $event; ?></h3>
        </div>
    </div>
</a>
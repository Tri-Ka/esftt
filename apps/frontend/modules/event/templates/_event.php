<a href="<?php echo url_for('event_show', array('id' => $event->getId())); ?>" class="text-center grid-item event-link">
	<div class="event-item shadowed">
	    <img class="" width="100%" src="<?php echo $event->retrievePictureUrl(); ?>" alt="...">
	    <div class="caption">
	        <h3><?php echo $event; ?></h3>
	    </div>
    </div>
</a>

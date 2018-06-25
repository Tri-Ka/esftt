<a href="<?php echo url_for('event_show', array('id' => $event->getId())); ?>" class="event-link event-link--simple hvr-grow-rotate box">
    <span class="event-link__date event-link__date__type-<?php echo $event->getType(); ?>">
        <?php if (0 < $event->getNbDaysLength()) : ?>
            <?php echo __('du '); ?><?php echo format_date($event->getDateFrom(), 'D'); ?>
            <?php echo __('au '); ?><?php echo format_date($event->getDateTo(), 'D'); ?>
        <?php else : ?>
            <?php echo __('le '); ?><?php echo format_date($event->getDateFrom(), 'D'); ?>
        <?php endif; ?>
    </span>
    <h3><?php echo $event; ?></h3>
</a>

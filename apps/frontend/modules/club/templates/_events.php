<div class="col-xs-12 col-sm-8 col-md-9">
    <div class="box-content marged-top">
    	<div class="row">
            <div class="no-box-title small marged-bottom">
                <?php echo __('Événements à venir'); ?>
            </div>

            <div class="grid">
                <?php foreach ($eventsToCome as $event): ?>
                    <?php include_partial('event/event_sm', array('event' => $event)); ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <div class="no-box-title small marged-bottom">
                <?php echo __('Événements passés'); ?>
            </div>

            <div class="grid">
                <?php foreach ($eventsPassed as $event): ?>
                    <?php include_partial('event/event_sm', array('event' => $event)); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-8 col-md-9">
    <div class="box marged-bottom">
        <div class="box-title">
            <?php echo __('Événements'); ?>
        </div>
    </div>

    <div class="box-content marged-top">
    	<div class="row">
            <div class="grid">
                <?php foreach ($events as $event): ?>
                    <?php include_partial('event/event_sm', array('event' => $event)); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

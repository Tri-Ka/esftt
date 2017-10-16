<div class="row">

    <?php include_partial('club/menu'); ?>

    <div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="events"><?php include_partial('club/events', array(
            'eventsToCome' => $eventsToCome,
            'eventsPassed' => $eventsPassed,
        )); ?></div>

		<div role="tabpanel" class="tab-pane" id="team"><?php include_partial('club/team', array('teams' => $teams)); ?></div>
    </div>

</div>

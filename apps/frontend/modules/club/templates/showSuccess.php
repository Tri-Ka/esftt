<div class="row">

    <?php include_partial('club/menu'); ?>

    <div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="histo"><?php include_partial('club/histo'); ?></div>
		<div role="tabpanel" class="tab-pane" id="team"><?php include_partial('club/team', array('teams' => $teams)); ?></div>
		<div role="tabpanel" class="tab-pane" id="pre-w"><?php include_partial('club/pre-w'); ?></div>
		<div role="tabpanel" class="tab-pane" id="maire-w"><?php include_partial('club/maire-w'); ?></div>
		<div role="tabpanel" class="tab-pane" id="events"><?php include_partial('club/events'); ?></div>
    </div>

</div>

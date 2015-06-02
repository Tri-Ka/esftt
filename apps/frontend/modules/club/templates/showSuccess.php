<div class="row">

    <?php include_partial('club/menu'); ?>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="histo"><?php include_partial('histo'); ?></div>
        <div role="tabpanel" class="tab-pane" id="team"><?php include_partial('team', array('teams' => $teams)); ?></div>
        <div role="tabpanel" class="tab-pane" id="pre-w"><?php include_partial('pre-w'); ?></div>
        <div role="tabpanel" class="tab-pane" id="maire-w"><?php include_partial('maire-w'); ?></div>
        <div role="tabpanel" class="tab-pane" id="events"><?php include_partial('events'); ?></div>
    </div>

</div>

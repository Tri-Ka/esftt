<div class="row">

    <div class="col-xs-12 col-sm-4 col-md-3">

        <div class="box col-xs-12 text-center">
            <div class="box-title">
                <i class="fa fa-star-o"></i><?php echo __('Le Club'); ?>
            </div>
            <div class="box-content marged-top">
                <ul class="nav nav-pills nav-stacked nav-tabs">
                    <li class="active"><a href="#histo" aria-controls="home" role="tab" data-toggle="tab"><?php echo __('Historique du club'); ?></a></li>
                    <li><a href="#team" aria-controls="team" role="tab" data-toggle="tab"><?php echo __('Nos équipes'); ?></a></li>
                    <li><a href="#pre-w" aria-controls="pre-w" role="tab" data-toggle="tab"><?php echo __('Le mot du Président'); ?></a></li>
                    <li><a href="#maire-w" aria-controls="maire-w" role="tab" data-toggle="tab"><?php echo __('Le mot du Maire'); ?></a></li>
                    <li><a href="#events" aria-controls="events" role="tab" data-toggle="tab"><?php echo __('Les évènements'); ?></a></li>
                    <li><a href="#infos" aria-controls="infos" role="tab" data-toggle="tab"><?php echo __('Informations'); ?></a></li>
                </ul>
            </div>
        </div>

    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="histo"><?php include_partial('histo'); ?></div>
        <div role="tabpanel" class="tab-pane" id="team"><?php include_partial('team'); ?></div>
        <div role="tabpanel" class="tab-pane" id="pre-w"><?php include_partial('pre-w'); ?></div>
        <div role="tabpanel" class="tab-pane" id="maire-w"><?php include_partial('maire-w'); ?></div>
        <div role="tabpanel" class="tab-pane" id="events"><?php include_partial('events'); ?></div>
        <div role="tabpanel" class="tab-pane" id="infos"><?php include_partial('infos'); ?></div>
    </div>

</div>

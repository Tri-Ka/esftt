<div class="menu-left">
    <div class="col-xs-12 col-sm-4">
        <div class="box-esftt text-center marged-top">
            <div class="full-div esftt">
                <?php echo __('ESFTT'); ?>
            </div>

            <img src="<?php echo public_path('images/blason.png'); ?>">

            <div class="full-div la-frette">
                <?php echo __('La Frette sur Seine'); ?>
            </div>
        </div>

        <?php if (0 < $events->count()) : ?>
            <div class="no-box-title small marged-top">
                <?php echo __('Évènements à venir'); ?>
            </div>

            <div class="event-list">
                <div class="row">
                    <?php foreach ($events as $event) : ?>
                        <div class="col-xs-12">
                            <?php include_partial('event/simpleEvent', array('event' => $event)); ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-xs-12 text-center">
                        <a href="<?php echo url_for('club'); ?>" class="btn btn-primary btn-xs">
                            <?php echo __('voir tous les évènements'); ?>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (0 < $competitions->count()) : ?>
            <div class="no-box-title small marged-top">
                <?php echo __('Compétitions'); ?>
            </div>

            <div class="event-list">
                <div class="row">
                    <?php foreach ($competitions as $event) : ?>
                        <div class="col-xs-12">
                            <?php include_partial('event/simpleEvent', array('event' => $event)); ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-xs-12 text-center">
                        <a href="<?php echo url_for('club'); ?>" class="btn btn-primary btn-xs">
                            <?php echo __('voir toutes les competitions'); ?>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="hidden-xs">
            <?php include_partial('homepage/calendar'); ?>
        </div>

        <?php if (0 < $sponsors->count()) : ?>
            <div class="special-block hidden-sm hidden-xs">
                <div class="no-box-title small marged-top">
                    <?php echo __('Nos partenaires'); ?>
                </div>

                <div class="special-list">
                    <div class="row">
                        <?php foreach ($sponsors as $sponsor) : ?>
                            <div class="col-xs-12">
                                <a href="<?php echo $sponsor->getLink(); ?>" target="_blank" class="special hvr-grow-rotate">
                                    <img class="special__img" src="<?php echo $sponsor->retrievePictureUrl(); ?>">

                                    <div class="special__title">
                                        <h4><?php echo $sponsor->getName(); ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="game-block hidden-sm hidden-xs">
            <a href="<?php echo url_for('pong'); ?>" class="hvr-grow-rotate">
                <img class="" src="<?php echo public_path('images/pong.jpg'); ?>">
            </a>
        </div>
    </div>
</div>

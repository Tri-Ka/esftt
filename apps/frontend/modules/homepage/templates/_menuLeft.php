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

    <?php if (0 < $events->count()): ?>
        <div class="no-box-title small marged-top">
            <?php echo __('Évènements à venir'); ?>
        </div>

        <div class="event-list">
            <div class="row">
                <?php foreach ($events as $event): ?>
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

    <div class="hidden-xs">
        <?php include_partial('homepage/calendar'); ?>
    </div>

    <div class="hidden hidden-xs clearfix">
        <a href="<?php echo url_for('club'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-star-o"></i> <?php echo __('Le Club'); ?>
                </div>
            </div>
        </a>

        <a href="<?php echo url_for('infos'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-question-circle"></i> <?php echo __('Informations'); ?>
                </div>
            </div>
        </a>

        <a href="<?php echo url_for('gallery'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-picture-o"></i> <?php echo __('Galerie'); ?>
                </div>
            </div>
        </a>

        <a href="<?php echo url_for('contact'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-envelope"></i> <?php echo __('Contact'); ?>
                </div>
            </div>
        </a>

        <a href="<?php echo url_for('forum'); ?>" class="separated">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-lock"></i> <?php echo __('Espace membre'); ?>
                </div>
            </div>
        </a>

        <a href="<?php echo sfConfig::get('app_url_facebook'); ?>" class="separated" target="_blank">
            <div class="box col-xs-12 hvr-grow-rotate marged-top" style="background:#3b5998; color: #fff !important;">
                <div class="box-title" style="background:#3b5998; color: #fff !important">
                    <i class="fa fa-facebook"></i> <?php echo __('Rejoignez-nous'); ?>
                </div>
            </div>
        </a>
    </div>

    <!-- <div class="box col-xs-12 marged-top">
        <div class="box-title text-center">
            <div class="full-text special-title"><?php echo __('Le mot du président'); ?></div>
            <img class="img-circle img-thumbnail marged-top" src="http://placehold.it/100x100">
        </div>
        <div class="box-content marged-top">
            Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum!
        </div>
    </div> -->

    <?php if (0 < $sponsors->count()): ?>
        <div class="special-block hidden-sm hidden-xs">
            <div class="no-box-title small marged-top">
                <?php echo __('Nos partenaires'); ?>
            </div>

            <div class="special-list">
                <div class="row">
                    <?php foreach ($sponsors as $sponsor): ?>
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

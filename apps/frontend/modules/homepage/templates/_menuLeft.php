<div class="col-xs-12 col-sm-4">
    <div class="box-esftt text-center col-xs-12 marged-top">
        <div class="full-div esftt">
            <?php echo __('ESFTT'); ?>
        </div>

        <img src="<?php echo public_path('images/blason.png'); ?>">

        <div class="full-div la-frette">
            <?php echo __('La Frette sur Seine'); ?>
        </div>
    </div>

    <div class="hidden-xs">

        <a href="<?php echo url_for('club'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-star-o"></i> <?php echo __('Le Club'); ?>
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

        <a href="<?php echo url_for('infos'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-question-circle"></i> <?php echo __('Informations'); ?>
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

        <a href="https://www.facebook.com/groups/46831155736/" class="separated" target="_blank">
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

    <div class="text-center marged-top hidden-xs" style="margin-top: 30px; float: left; width: 100%; z-index: 10;">
        <img class="marged-top" width="40%" src="<?php echo public_path('images/build.png'); ?>">
    </div>

</div>

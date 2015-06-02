<?php // include_component('homepage', 'slider'); ?>

<div class="row">

    <div class="col-xs-12 col-sm-4">
        <div class="box text-center col-xs-12 marged-top">
            <div class="full-div esftt">
                <?php echo __('ESFTT'); ?>
            </div>

            <img src="<?php echo public_path('images/blason.png'); ?>">

            <div class="full-div la-frette">
                <?php echo __('La Frette sur Seine'); ?>
            </div>
        </div>

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

        <div class="box col-xs-12 marged-top">
            <div class="box-title text-center">
                <div class="full-text"><?php echo __('Le mot du président'); ?></div>
                <img class="img-circle img-thumbnail marged-top" src="http://placehold.it/100x100">
            </div>
            <div class="box-content marged-top">
                Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum!
            </div>
        </div>

    </div>

    <div class="col-xs-12 col-sm-8">
        <div class="box marged-top">

            <div class="box-title">
                <?php echo __('Les dernières actus'); ?>
            </div>

            <div class="box-content">

                <?php foreach ($articles as $article): ?>
                    <?php include_partial('article/article', array('article' => $article)); ?>

                    <hr>

                <?php endforeach; ?>

                <?php include_partial('general/pagination', array('pager' => $articles, 'url' => url_for('homepage'))); ?>

            </div>

        </div>
    </div>

</div>

<?php include_partial('slider'); ?>

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

        <a href="<?php echo url_for('infos'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-question-circle"></i> <?php echo __('Informations'); ?>
                </div>
            </div>
        </a>

        <a href="#">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-star-o"></i> <?php echo __('Le Club'); ?>
                </div>
            </div>
        </a>

        <a href="#">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-envelope"></i> <?php echo __('Contacts'); ?>
                </div>
            </div>
        </a>

        <a href="<?php echo url_for('gallery'); ?>">
            <div class="box col-xs-12 hvr-grow-rotate marged-top">
                <div class="box-title">
                    <i class="fa fa-picture-o"></i> <?php echo __('Gallerie'); ?>
                </div>
            </div>
        </a>

    </div>

    <div class="col-xs-12 col-sm-8">
        <div class="box marged-top">

            <div class="box-title">
                <?php echo __('News'); ?>
            </div>

            <div class="box-content">

                <?php for ($i = 0; $i< 4; $i++): ?>

                    <?php include_partial('article/article'); ?>

                <?php endfor; ?>

            </div>

        </div>
    </div>

</div>

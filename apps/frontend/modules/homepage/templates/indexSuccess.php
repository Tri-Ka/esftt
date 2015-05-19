<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo public_path('images/slides/01.jpg'); ?>">
        </div>
        <div class="item">
          <img src="<?php echo public_path('images/slides/02.jpg'); ?>">
        </div>
        <div class="item">
          <img src="<?php echo public_path('images/slides/03.jpg'); ?>">
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-4">

            <div class="box text-center col-xs-12">

                <div class="full-div esftt">
                    <?php echo __('ESFTT'); ?>
                </div>

                <img src="<?php echo public_path('images/blason.png'); ?>">

                <div class="full-div la-frette">
                    <?php echo __('La Frette sur Seine'); ?>
                </div>

            </div>

            <div class="box text-center col-xs-12">

                <div class="full-div esftt">
                    <?php echo __('ESFTT'); ?>
                </div>

                <img src="<?php echo public_path('images/blason.png'); ?>">

                <div class="full-div la-frette">
                    <?php echo __('La Frette sur Seine'); ?>
                </div>

            </div>


    </div>

    <div class="col-xs-12 col-sm-8">
        <div class="box">

            <div class="box-title">
                <?php echo __('News'); ?>
            </div>

            <div class="box-content">

                <div class="row">

                    <?php for ($i=0 ; $i< 4; $i++): ?>

                        <?php include_partial('article/article'); ?>

                    <?php endfor; ?>

                </div>

            </div>

        </div>
    </div>

</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">

        <?php foreach ($pictures as $k => $picture): ?>

            <li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>" class="<?php echo 0 == $k ? 'active' : ''; ?>"></li>

        <?php endforeach; ?>

    </ol>

    <div class="carousel-inner" role="listbox">

        <?php foreach ($pictures as $k => $picture): ?>
            
            <div class="item <?php echo 0 == $k ? 'active' : ''; ?>">
              <img class="img-responsive center-block" src="<?php echo public_path('uploads/slides' . $picture); ?>">
            </div>

        <?php endforeach; ?>

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

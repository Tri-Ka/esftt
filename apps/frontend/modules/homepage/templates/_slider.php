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

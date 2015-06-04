<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">

        <?php foreach ($pictures as $k => $picture): ?>

            <div class="item <?php echo 0 == $k ? 'active' : ''; ?>">
              <img class="img-responsive center-block" src="<?php echo public_path('uploads/slides'.$picture); ?>">
            </div>

        <?php endforeach; ?>

    </div>

</div>

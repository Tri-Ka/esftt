<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">

    <div class="carousel-inner" role="listbox">

        <?php foreach ($pictures as $k => $picture): ?>

            <div class="item <?php echo 0 == $k ? 'active' : ''; ?>" style="background: url('<?php echo public_path('uploads/slides'.$picture); ?>'); background-size: cover !important; background-position: center;">
            </div>

        <?php endforeach; ?>

    </div>

</div>

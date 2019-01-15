<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
    <div class="carousel-inner" role="listbox">
        <?php foreach ($pictures as $k => $picture) : ?>
            <div class="item <?php echo 0 == $k ? 'active' : ''; ?>">
                <img src="<?php echo $picture->retrieveFileUrl(); ?>" width="100%">
            </div>
        <?php endforeach; ?>

        <?php if (0 === $pictures->count()) : ?>
            <div class="item active">
                <img src="<?php echo public_path('images/default-cover.jpg'); ?>" width="100%">
            </div>
        <?php endif; ?>
    </div>
</div>

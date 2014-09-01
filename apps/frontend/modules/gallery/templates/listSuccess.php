<div class="head">

<h1><?php echo __('Albums du club'); ?></h1>

</div>

<div class="galleries-list">

	<?php foreach ($galleries as $gallery): ?>


		<?php if($gallery->getCover()): ?>

			<a href="<?php echo url_for('gallery_show', array('id' => $gallery->getId())); ?>" class="gallery-ico">

			<img src="<?php echo $gallery->getCover()->retrievePictureUrl(); ?>">

			<div class="gallery-name"><?php echo $gallery->getName(); ?></div>

			</a>

		<?php endif; ?>

	<?php endforeach; ?>

</div>




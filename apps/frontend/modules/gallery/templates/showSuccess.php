<div id="gallery" class="content">

	<div id="controls" class="controls"></div>
	<div class="slideshow-container">
		<div id="loading" class="loader"></div>
		<div id="slideshow" class="slideshow"></div>
	</div>
	<div id="caption" class="caption-container"></div>
</div>
<div id="thumbs" class="navigation">
	<ul class="thumbs noscript">

		<?php foreach ($gallery->getPictures() as $p): ?>

		<li>
			<a class="thumb" name="leaf" href="<?php echo $p->retrievePictureUrl(true, true); ?>" title="Title #0">
				<img src="<?php echo $p->retrievePictureUrl(true, true); ?>" alt="Title #0" />
			</a>
			<div class="caption">
				<div class="download">
					<a href="<?php echo $p->retrievePictureUrl(); ?>">Download Original</a>
				</div>
				<div class="image-title">Title #0</div>
				<div class="image-desc"><?php echo $p->getDescription(); ?></div>
			</div>
		</li>

		<?php endforeach; ?>

	</ul>
</div>

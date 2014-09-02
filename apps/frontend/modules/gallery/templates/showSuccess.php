<div class="head">

	<h1><?php echo $gallery->getName(); ?></h1>

</div>

<div id="gallery" class="content">

	<div id="caption" class="h2 caption-container"></div>

	<div class="slideshow-container">
		<div id="slideshow" class="slideshow"></div>
	</div>

	<div id="controls" class="controls"></div>

	<div id="thumbs" class="navigation">
		<ul class="thumbs noscript">

			<?php foreach ($gallery->getPictures() as $p): ?>

			<li>
				<a class="thumb" name="leaf" href="<?php echo $p->retrievePictureUrl(true, true); ?>" title="Title #0">
					<img src="<?php echo $p->retrievePictureUrl(true, true); ?>" alt="Title #0" />
				</a>
				<div class="caption">
					<div class="image-desc"><?php echo $p->getDescription(); ?></div>
				</div>
			</li>

			<?php endforeach; ?>

		</ul>
	</div>

</div>


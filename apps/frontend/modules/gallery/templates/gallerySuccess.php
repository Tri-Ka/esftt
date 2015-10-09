<div class="col-xs-12">

	<div class="no-box-title">
		<i class="fa fa-photo"></i> <?php echo $title; ?>
	</div>

</div>

<div class="box col-xs-12 marged-top">

	<div class="row">
		<div class="col-xs-12">
			<a href="<?php echo url_for('gallery'); ?>">Galerie</a>

			<?php $folderRoot = ''; ?>

			<?php foreach ($breadscrums as $folder): ?>
				<?php $folderRoot.= '/'.$folder; ?>
				/ <a href="<?php echo url_for('gallery', array('folder' => $folderRoot)); ?>"><?php echo $folder ; ?></a>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<?php if (count($pictures) > 0): ?>

	<div class="box col-xs-12 marged-top black">

		<div class="swiper-container gallery-top">
	        <div class="swiper-wrapper">
	        	<?php foreach ($pictures as $picture): ?>
	            	<div class="swiper-slide">
	            		<img data-src="<?php echo public_path('uploads/gallery'.$picture['path'].$picture['name']); ?>" class="swiper-lazy photo">
		                <!-- Preloader image -->
		                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
	            	</div>
	        	<?php endforeach; ?>
	        </div>
	        <!-- Add Arrows -->
	        <div class="swiper-button-next swiper-button-white"></div>
	        <div class="swiper-button-prev swiper-button-white"></div>
	    </div>
	    

	</div>

    <div class="box col-xs-12 marged-top">
    	<div class="box-content">
			<div id="disqus_thread"></div>
		</div>
	</div>

<?php endif; ?>

<?php if (0 < count($directories)): ?>

	<div class="row">

		<div class="col-xs-12 marged-top directories">

			<div class="row">

				<?php foreach ($directories as $directory): ?>

					<div class="col-xs-12 col-sm-3 marged-top hvr-grow directory text-center">
						<a href="<?php echo url_for('gallery', array('folder' => $directory['path'])); ?>" class="gallery-folder">
								
							<?php if ('' !== $directory['picture']): ?>
								<div class="box black">
									<img style="max-width: 100%; max-height: 100%; margin-auto';" src="<?php echo public_path('uploads/gallery/'.$directory['path'].$directory['picture']); ?>">
								</div>
								<div class="gallery-hover">
									<?php echo $directory['name']; ?>
								</div>
							<?php else: ?>
								<div class="box black">
									<img width="100%" src="<?php echo public_path('images/default-gallery.jpg'); ?>">
								</div>
								<div class="gallery-hover">
									<?php echo $directory['name']; ?>
								</div>
							<?php endif; ?>
							
						</a>
					</div>

				<?php endforeach; ?>

			</div>

		</div>
	
	</div>

<?php endif; ?>

<div class="box col-xs-12">

	<div class="box-title">
		<i class="fa fa-photo"></i> <?php echo __('Gallerie'); ?>
	</div>

</div>

<?php if (count($pictures) > 0): ?>

	<div class="box col-xs-12 marged-top black">

		<div class="swiper-container gallery-top">
	        <div class="swiper-wrapper">
	        	<?php foreach ($pictures as $picture): ?>
	            	<div class="swiper-slide">
	            		<img height="100%" src="<?php echo public_path('uploads/gallery/'.$picture['path'].$picture['name']); ?>">
	            	</div>
	        	<?php endforeach; ?>
	        </div>
	        <!-- Add Arrows -->
	        <div class="swiper-button-next swiper-button-white"></div>
	        <div class="swiper-button-prev swiper-button-white"></div>
	    </div>
	    <div class="swiper-container gallery-thumbs">
	        <div class="swiper-wrapper">
	            <?php foreach ($pictures as $picture): ?>
	            	<div class="swiper-slide">
	            		<img height="100%" src="<?php echo public_path('uploads/gallery/'.$picture['path'].$picture['name']); ?>">
	            	</div>
	        	<?php endforeach; ?>
	        </div>
	    </div>

	</div>

<?php endif; ?>

<?php if (0 < count($directories)): ?>

	<div class="box col-xs-12 marged-top">

		<?php foreach ($directories as $directory): ?>

			<div class="col-xs-6 col-sm-3">
				<a href="<?php echo url_for('gallery', array('folder' => $directory['path'])); ?>" class="gallery-folder">
						
					<?php if ('' !== $directory['picture']): ?>
						<div class="box black">
							<img width="100%" src="<?php echo public_path('uploads/gallery/'.$directory['path'].$directory['picture']); ?>">
						</div>
						<div class="gallery-hover">
							<?php echo $directory['name']; ?>
						</div>
					<?php else: ?>
						<div class="box text-center">
							<?php echo $directory['name']; ?>
						</div>
					<?php endif; ?>
					
				</a>
			</div>

		<?php endforeach; ?>

	</div>

<?php endif; ?>
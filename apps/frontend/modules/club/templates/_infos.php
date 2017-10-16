<?php foreach ($iElems as $info): ?>
	<div class="box marged-top">
		<div class="box-title">
			<?php echo $info->getTitle(); ?>
		</div>

		<div class="box-content  marged-top">
			<?php echo $info->getContent(ESC_RAW); ?>
		</div>
	</div>
<?php endforeach; ?>

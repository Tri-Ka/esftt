<div class="row">
	<?php include_partial('private/menu', array('active' => 'files')); ?>

	<div class="col-xs-12 col-sm-8">
		<div class="no-box-title text-center marged-bottom-2">
			<?php echo __('Documents'); ?>
		</div>

		<div class="row">
			<div class="grid">
				<?php foreach ($files as $file): ?>
					<div class="grid-item col-xs-12 col-sm-4">
						<div class="file-item">
							<div class="file-item__left">
								<?php echo $file; ?>
							</div>

							<div class="file-item__right">
								<a href="<?php echo $file->retrieveFileUrl() ?>" class="btn-file-download" target="_blank" data-toggle="tooltip" title="<?php echo __('Télécharger la pèce jointe') ?>" download="<?php echo $file; ?>">
		                            <i class="fa fa-download"></i>
		                        </a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

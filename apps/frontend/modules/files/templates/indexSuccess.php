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
						<a href="<?php echo $file->retrieveFileUrl() ?>" class="file-item" target="_blank" data-toggle="tooltip" title="<?php echo __('Télécharger la pèce jointe') ?>" download="<?php echo $file; ?>">
							<div class="file-item__left">
								<?php echo $file; ?>
							</div>

							<div class="file-item__right">
								<div class="btn-file-download">
		                            <i class="fa fa-download"></i>
		                        </div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

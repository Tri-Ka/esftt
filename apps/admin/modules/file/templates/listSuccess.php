<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Fichier <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-file"></i> Fichiers
            </li>
        </ol>
    </div>
</div>

<div class="row">

	<div class="col-xs-12">
	    <div class="table-responsive">
	        <table class="table table-bordered table-hover table-striped">
	            <thead>
	                <tr>
	                    <th>#</th>
						<th><?php echo __('nom'); ?></th>
						<th><?php echo __('url'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($files->getResults() as $file): ?>
		        		<tr>
							<th><?php echo $file->getId(); ?></th>
							<td><?php echo $file->getName(); ?></td>
							<td><?php echo $file->retrieveFileUrl(); ?></td>
							<td>
								<a href="<?php echo $file->retrieveFileUrl() ?>" class="btn btn-success btn-xs" target="_blank" title="<?php echo __('Télécharger la pèce jointe') ?>">
		                            <?php echo __('Télécharger'); ?> <i class="fa fa-download"></i>
		                        </a>
								<a href="<?php echo url_for('file_edit', array('id' => $file->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('file_delete', array('id' => $file->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

			<?php include_partial('general/pagination', array('pager' => $files, 'url' => url_for('file_list'))); ?>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('file_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>

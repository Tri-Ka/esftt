<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Infos <small>Listing</small>
        </h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-newspaper-o"></i> Infos
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
	                    <th><?php echo __('titre'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>

	            <tbody>
		        	<?php foreach ($iElems as $elem): ?>
		        		<tr>
							<th><?php echo $elem->getId(); ?></th>
							<th><?php echo $elem->getTitle(); ?></th>
							<td>
								<a href="<?php echo url_for('info_elem_edit', array('id' => $elem->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('info_elem_delete', array('id' => $elem->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>
		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

			<?php include_partial('general/pagination', array('pager' => $iElems, 'url' => url_for('info_elem_list'))); ?>
	    </div>
	</div>

	<div class="col-xs-12">
		<a href="<?php echo url_for('info_elem_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>
</div>

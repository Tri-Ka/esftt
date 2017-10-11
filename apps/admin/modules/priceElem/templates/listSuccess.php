<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Tarifs <small>Listing</small>
        </h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-newspaper-o"></i> Tarifs
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
	                    <th><?php echo __('categorie'); ?></th>
						<th><?php echo __('Nom'); ?></th>
						<th><?php echo __('infos'); ?></th>
						<th><?php echo __('prix'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>

	            <tbody>
		        	<?php foreach ($pElems as $elem): ?>
		        		<tr>
							<th><?php echo $elem->getId(); ?></th>
							<th><?php echo $elem->getCategory(); ?></th>
							<td><?php echo $elem->getElement(); ?></td>
							<td><?php echo $elem->getInfo(); ?></td>
							<td><?php echo $elem->getPrice(); ?></td>
							<td>
								<a href="<?php echo url_for('price_elem_edit', array('id' => $elem->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('price_elem_delete', array('id' => $elem->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>
		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

			<?php include_partial('general/pagination', array('pager' => $pElems, 'url' => url_for('price_elem_list'))); ?>
	    </div>
	</div>

	<div class="col-xs-12">
		<a href="<?php echo url_for('price_elem_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>
</div>

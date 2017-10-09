<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Articles <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-newspaper-o"></i> Articles
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
						<th><?php echo __('pitch'); ?></th>
						<th><?php echo __('publié ?'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>

		        	<?php foreach ($articles as $article): ?>

		        		<tr>
							<th><?php echo $article->getId(); ?></th>
							<td><?php echo $article->getTitle(); ?></td>
							<td><?php echo $article->getSubTitle(); ?></td>
							<td><?php echo true == $article->getIsPublished() ? '<i class="fa fa-check green"></i>' : ''; ?></td>
							<td>
								<a href="<?php echo url_for('article_edit', array('id' => $article->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('article_delete', array('id' => $article->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

			<?php include_partial('general/pagination', array('pager' => $articles, 'url' => url_for('article_list'))); ?>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('article_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>

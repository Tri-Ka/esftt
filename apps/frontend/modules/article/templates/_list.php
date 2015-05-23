<div class="col-xs-12 col-sm-8">
    <div class="box">

    	<div class="box-title">
    		<?php echo __('Liste des articles'); ?>
    	</div>

        <div class="box-content marged-top">

        	<table class="table table-striped table-hover">

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
							<th scope="row"><?php echo $article->getId(); ?></th>
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
        	<div class="row">
	        	<div class="col-xs-12">
	        		<a href="<?php echo url_for('article_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	        	</div>
        	</div>

        </div>
    </div>
</div>


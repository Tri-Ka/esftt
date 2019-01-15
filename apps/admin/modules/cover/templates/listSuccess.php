<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Couvertures <small>Listing</small>
        </h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-file"></i> Couvertures
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
	                    <th><?php echo __('Position'); ?></th>
                        <th width="400"><?php echo __('image'); ?></th>
                        <th><?php echo __('actions'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($covers->getResults() as $file) : ?>
                        <tr>
                            <th><?php echo $file->getId(); ?></th>
                            <th><?php echo $file->getPosition(); ?></th>
                            <td><img src="<?php echo $file->retrieveFileUrl(); ?>" width="400"></td>
                            <td>
                                <a href="<?php echo $file->retrieveFileUrl() ?>" class="btn btn-success btn-xs" target="_blank" title="<?php echo __('Télécharger l\'image') ?>">
                                    <?php echo __('Télécharger'); ?> <i class="fa fa-download"></i>
                                </a>
                                <a href="<?php echo url_for('cover_edit', array('id' => $file->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-edit"></i></a>
                                <a href="<?php echo url_for('cover_delete', array('id' => $file->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php include_partial('general/pagination', array('pager' => $covers, 'url' => url_for('cover_list'))); ?>

        </div>
    </div>

    <div class="col-xs-12">
        <a href="<?php echo url_for('cover_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
    </div>
</div>

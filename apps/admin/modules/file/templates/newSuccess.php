<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Fichier <small>New</small>
        </h1>
        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-file"></i>  <a href="<?php echo url_for('file_list'); ?>">Fichiers</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Nouveau Fichier
            </li>
        </ol>
    </div>
</div>

<div class="row">
	<?php include_partial('form', array('form' => $form)); ?>
</div>

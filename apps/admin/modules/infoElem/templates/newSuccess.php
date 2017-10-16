<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Info <small>New</small>
        </h1>

        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-newspaper-o"></i>  <a href="<?php echo url_for('info_elem_list'); ?>">Infos</a>
            </li>

            <li class="active">
                <i class="fa fa-plus"></i> Nouveau info
            </li>
        </ol>
    </div>
</div>

<div class="row">
	<?php include_partial('form', array('form' => $form)); ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Categorie de prix <small>New</small>
        </h1>

        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-newspaper-o"></i>  <a href="<?php echo url_for('price_cat_list'); ?>">Categories de prix</a>
            </li>

            <li class="active">
                <i class="fa fa-plus"></i> Nouvelle Categorie de prix
            </li>
        </ol>
    </div>
</div>

<div class="row">
	<?php include_partial('form', array('form' => $form)); ?>
</div>

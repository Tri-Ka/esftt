<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Sponsor <small>New</small>
        </h1>
        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-star"></i>  <a href="<?php echo url_for('sponsor_list'); ?>">Sponsors</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Nouveau sponsor
            </li>
        </ol>
    </div>
</div>

<div class="row">

	<?php include_partial('form', array('form' => $form)); ?>

</div>

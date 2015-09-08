<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Topic général <small>New</small>
        </h1>
        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-bullhorn"></i>  <a href="<?php echo url_for('forum'); ?>">Forum</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Nouveau topic général
            </li>
        </ol>
    </div>
</div>

<div class="row">

	<?php include_partial('form', array('form' => $form)); ?>
		
</div>

</div>
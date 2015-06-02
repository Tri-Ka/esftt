<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Evènement <small>New</small>
        </h1>
        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-calendar"></i>  <a href="<?php echo url_for('event_list'); ?>">Evènements</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Nouvel Evènement
            </li>
        </ol>
    </div>
</div>

<div class="row">

	<?php include_partial('form', array('form' => $form)); ?>
		
</div>

</div>
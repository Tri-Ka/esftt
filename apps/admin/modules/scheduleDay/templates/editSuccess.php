<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Horaire <small>Edition</small>
        </h1>

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-newspaper-o"></i>  <a href="<?php echo url_for('schedule_day_list'); ?>">Horaire</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Edition de l'horaire
            </li>
        </ol>
    </div>
</div>

<div class="row">
	<?php include_partial('form', array('form' => $form)); ?>
</div>

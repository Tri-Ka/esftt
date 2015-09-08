<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Topic général<small>Edition</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-calendar"></i>  <a href="<?php echo url_for('forum'); ?>">Topics généraux</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Edition du topic
            </li>
        </ol>
    </div>
</div>


<div class="row">

	<?php include_partial('form', array('form' => $form)); ?>
		
</div>

</div>
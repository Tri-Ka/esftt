<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Utilisateur <small>New</small>
        </h1>
        <ol class="breadcrumb">
        	<li>
                <i class="fa fa-users"></i>  <a href="<?php echo url_for('user_list'); ?>">Utilisateurs</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Nouvel Utilisateur
            </li>
        </ol>
    </div>
</div>

<div class="row">

	<?php include_partial('form', array('form' => $form)); ?>
		
</div>

</div>
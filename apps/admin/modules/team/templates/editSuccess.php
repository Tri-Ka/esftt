<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Team <small>Edition</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-star-o"></i>  <a href="<?php echo url_for('team_list'); ?>">Teams</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Edition de la team
            </li>
        </ol>
    </div>
</div>


<div class="row">

	<?php include_partial('form', array('form' => $form, 'membersWithoutTeam' => $membersWithoutTeam)); ?>
		
</div>

</div>
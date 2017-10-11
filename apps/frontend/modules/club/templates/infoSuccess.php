<div class="col-xs-12">
	<div class="no-box-title">
		<i class="fa fa-question-circle"></i> <?php echo __('Informations'); ?>
	</div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6">
    	<?php include_component('club', 'horaires'); ?>
    	<?php include_component('club', 'prices'); ?>
    </div>

 	<div class="col-xs-12 col-sm-6">
 		<?php include_partial('salle'); ?>
 		<?php include_partial('competitions'); ?>
 		<?php include_partial('renseignements'); ?>
 	</div>
</div>

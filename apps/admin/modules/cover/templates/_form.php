<form action="" method="post" class="article-form" enctype="multipart/form-data">
	<?php echo $form->renderHiddenFields() ?>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <label><?php echo __('Fichier'); ?></label>
            <?php echo $form['file_name']->render(array('class' => 'form-control')); ?>
        </div>

        <div class="form-group">
            <label><?php echo __('Position'); ?></label>
            <?php echo $form['position']->render(array('class' => 'form-control')); ?>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="enregistrer">
        </div>
    </div>
</form>

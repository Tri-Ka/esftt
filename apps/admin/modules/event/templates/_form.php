<form action="" method="post" class="article-form" enctype="multipart/form-data">
	<?php echo $form->renderHiddenFields() ?>
    <div class="col-xs-12 col-sm-6">

        <div class="form-group">
            <label><?php echo __('Nom'); ?></label>
            <?php echo $form['name']->render(array('class' => 'form-control')); ?>
        </div>

        <div class="form-group full-label">
            <label><?php echo __('Illustration'); ?></label>
            <?php echo $form['picture']->render(); ?>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <label><?php echo __('Type'); ?></label>
            <?php echo $form['type']->render(array('class' => 'form-control')); ?>
        </div>

        <div class="form-group">
            <label><?php echo __('Description'); ?></label>
            <?php echo $form['description']->render(array('class' => 'form-control')); ?>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label><?php echo __('Date de début'); ?></label>

                    <div class='input-group date'>
                        <?php echo $form['date_from']->render(array('class' => 'form-control datepicker')); ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label><?php echo __('Date de fin'); ?></label>
                    <div class='input-group date'>
                        <?php echo $form['date_to']->render(array('class' => 'form-control datepicker')); ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="enregistrer">
        </div>
    </div>
</form>

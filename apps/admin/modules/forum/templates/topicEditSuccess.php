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

    <form action="" method="post" class="article-form" enctype="multipart/form-data">

    	<?php echo $form->renderHiddenFields() ?>

        <div class="col-xs-12 col-sm-6">

            <div class="form-group">
                <label><?php echo __('Auteur'); ?></label>
                <?php echo $form['author_id']->render(array('class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label><?php echo __('Topic général'); ?></label>
                <?php echo $form['big_topic_id']->render(array('class' => 'form-control')); ?>
            </div>

        </div>

        <div class="col-xs-12 col-sm-6">

            <div class="form-group">
                <label><?php echo __('Titre'); ?></label>
                <?php echo $form['title']->render(array('class' => 'form-control')); ?>
            </div>

        </div>

        <div class="col-xs-12">

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="enregistrer">
            </div>

        </div>

    </form>

</div>

</div>
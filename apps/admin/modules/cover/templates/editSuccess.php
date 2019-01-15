<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Couverture <small>Edition</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-file"></i>  <a href="<?php echo url_for('cover_list'); ?>">Couvertures</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Edition du fichier
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <?php include_partial('form', array('form' => $form)); ?>
</div>

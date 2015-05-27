<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Article <small>Edition</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-newspaper-o"></i>  <a href="<?php echo url_for('article_list'); ?>">Articles</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Edition de l'article
            </li>
        </ol>
    </div>
</div>


<div class="row">

	<?php include_partial('form', array('form' => $form)); ?>
		
</div>

</div>
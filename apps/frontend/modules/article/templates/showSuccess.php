<?php slot('page_title', $article->getTitle()); ?>
<?php slot('page_image', $article->retrievePictureUrl()); ?>
<?php slot('page_url', url_for('article_show', array('id' => $article->getId()), true)); ?>
<?php slot('page_description', $article->getSubTitle()); ?>

 <div class="row">
    <?php include_component('homepage', 'menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="no-box-title text-center">
            <?php echo __('News'); ?>
        </div>

        <?php include_partial('article', array('article' => $article, 'big' => true)); ?>
    </div>
</div>

<?php $desc = simplyfyText($article->getContent(), true); ?>

<?php slot('page_title', $article->getTitle()); ?>
<?php slot('page_image', $article->retrievePictureUrl(true)); ?>
<?php slot('page_url', url_for('article_show', array('id' => $article->getId()), true)); ?>
<?php slot('page_description', $desc); ?>

 <div class="row">
    <?php include_component('homepage', 'menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="no-box-title text-center marged-bottom">
            <?php echo __('Les actus'); ?>
        </div>

        <?php include_partial('article', array('article' => $article, 'big' => true)); ?>
    </div>
</div>

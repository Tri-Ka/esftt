<div class="row">
    <?php include_component('homepage', 'menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">
        <div class="no-box-title marged-top marged-bottom--big">
            <?php echo __('Les actus'); ?>
        </div>

        <?php foreach ($articles->getResults() as $article) : ?>
            <?php include_partial('article/article', array('article' => $article)); ?>
        <?php endforeach; ?>

        <?php include_partial('general/pagination', array('pager' => $articles, 'url' => url_for('homepage'))); ?>

        <div class="visible-xs">
            <?php include_partial('homepage/calendar'); ?>
        </div>
    </div>
</div>

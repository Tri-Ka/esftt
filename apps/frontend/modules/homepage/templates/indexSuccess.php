<div class="row">

    <?php include_partial('menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">
        <div class="box marged-top padded-bottom">

            <div class="box-title special-title">
                <?php echo __('Les actus'); ?>
            </div>

            <div class="box-content">

                <?php foreach ($articles->getResults() as $article): ?>
                    <?php include_partial('article/article', array('article' => $article)); ?>

                    <hr>
                <?php endforeach; ?>

                <?php include_partial('general/pagination', array('pager' => $articles, 'url' => url_for('homepage'))); ?>

            </div>

        </div>
    </div>

    <div class="col-xs-12 col-sm-8 pull-right">
        <div class="box marged-top">

            <div class="box-title special-title">
                <?php echo __('Les derniers évènements'); ?>
            </div>

            <div class="box-content marged-top">
                <div class="row">
                    <?php foreach ($events as $event): ?>
                        
                        <?php include_partial('event/event', array('event' => $event)); ?>

                    <?php endforeach; ?>

                    <div class="col-xs-12 text-center">
                        <a href="<?php echo url_for('club'); ?>" class="btn btn-primary">voir tous les évènements</a>
                    </div>

                </div>

            </div>

        </div>
    </div>


</div>

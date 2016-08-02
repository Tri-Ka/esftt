<div class="row">

    <?php include_partial('menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">
        <div class="no-box-title small marged-top">
            <?php echo __('Les actus'); ?>
        </div>

        <div class="marged-top padded-bottom marged-bottom-2">
            <div class="box-content">
                <?php foreach ($articles->getResults() as $article): ?>
                    <div class="box marged-bottom">
                        <?php include_partial('article/article', array('article' => $article)); ?>
                    </div>
                <?php endforeach; ?>

                <?php include_partial('general/pagination', array('pager' => $articles, 'url' => url_for('homepage'))); ?>
            </div>
        </div>

        <div class="no-box-title small marged-top">
            <?php echo __('Évènements à venir'); ?>
        </div>

        <div class="marged-top-2">
            <div class="row">
                <?php if (0 < $events->count()): ?>
                    <div class="grid">
                        <?php foreach ($events as $event): ?>
                            <?php include_partial('event/event', array('event' => $event)); ?>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="text-center white-text">
                        <i> aucun évènement à venir pour le moment ...</i>
                    </div>
                <?php endif; ?>

                <div class="col-xs-12 text-center marged-top">
                    <a href="<?php echo url_for('club'); ?>" class="btn btn-primary">voir tous les évènements</a>
                </div>
            </div>
        </div>
    </div>
</div>

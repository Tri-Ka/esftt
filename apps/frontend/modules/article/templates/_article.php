<div class="row">
    <div class="col-xs-12">
        <div class="article">
            <div class="article__date">
                <span class="day"><?php echo date('d', strtotime($article->getCreatedAt())); ?></span>
                <span class="month"><?php echo __(date('M', strtotime($article->getCreatedAt()))); ?></span>
            </div>

            <?php if (null !== $article->getPicture()): ?>
                <a class="article__img" style="background-image: url('<?php echo $article->retrievePictureUrl(); ?>');" href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>"></a>
            <?php endif; ?>

            <h3 class="article__title">
                <?php echo $article->getTitle(); ?>
            </h3>

            <?php if (isset($big) && $big === true): ?>
                <div class="article__mini-content">
                    <?php echo $article->getContent(ESC_RAW); ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div
                                class="fb-like"
                                data-share="true"
                                data-width="450"
                                data-show-faces="true">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="fb-comments" data-href="<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>" data-width="100%" data-numposts="10"></div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="article__mini-content">
                    <?php echo simplyfyText($article->getContent()); ?>
                </div>

                <a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>" class="btn btn-primary btn-xs marged-top">
                    <?php echo __('voir la suite'); ?> <i class="fa fa-chevron-right"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

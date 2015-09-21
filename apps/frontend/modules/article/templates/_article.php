<div class="row article">
    <div class="col-xs-12 title-part">
        <div class="row">
             <div class="col-xs-12 article-title">
                <div class="article-title-left">
                    <div class="date">
                        <span class="day"><?php echo date('d', strtotime($article->getCreatedAt())); ?></span>
                        <span class="month"><?php echo __(date('M', strtotime($article->getCreatedAt()))); ?></span>
                        <!-- <span class="year">2015</span> -->
                    </div>
                </div>
                <div class="article-title-right">
                    <div class="news-title">
                        <?php echo $article->getTitle(); ?>
                    </div>
                </div>
            </div>
        </div>
 	</div>

    <?php if (null !== $article->getPicture()): ?>

        <a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>">
            <div class="col-xs-12 col-md-5 img-cont">
                <img class="thumbnail" src="<?php echo $article->retrievePictureUrl(); ?>">
            </div>
        </a>

    <?php endif; ?>

    <div class="col-xs-12 col-md-5">
        <div class="row">
            <div class="col-xs-12 news-subtitle"><?php echo $article->getSubTitle(); ?></div>
        </div>
    </div>

    <div class="view-artcle-btn">
        <div class="nb-coms"><i class="fa fa-comments"></i><a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>#disqus_thread" class="coms-number"></a></div>
        <?php echo __('voir la suite'); ?>
        <a class="overide-link" href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>"></a>
    </div>

</div>

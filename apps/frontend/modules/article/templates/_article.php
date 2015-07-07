<div class="row article">
    <div class="col-xs-12 title-part">
        <div class="row">
            <div class="col-sm-2 col-xs-12">
         		<div class="date">
        	 		<span class="day"><?php echo date('d', strtotime($article->getCreatedAt())); ?></span>
        	 		<span class="month"><?php echo __(date('M', strtotime($article->getCreatedAt()))); ?></span>
        	 		<!-- <span class="year">2015</span> -->
         		</div>
            </div>
            <div class="col-sm-10 col-xs-12">
         		<div class="news-title">
         			<?php echo $article->getTitle(); ?>
         		</div>
            </div>
        </div>
 	</div>

    <?php if (null !== $article->getPicture()): ?>

        <div class="col-xs-12 col-md-5 img-cont">
            <img class="thumbnail" src="<?php echo $article->retrievePictureUrl(); ?>">
        </div>

    <?php endif; ?>

    <div class="col-xs-12 col-md-5">
        <div class="row">
            <div class="col-xs-12"><?php echo $article->getSubTitle(); ?></div>
        </div>
    </div>

    <a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>#disqus_thread" class="coms-number"></a>
    <a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>" class="btn btn-primary btn-xs show-article"><?php echo __('voir la suite'); ?></a>

</div>

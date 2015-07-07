 <div class="row article">

 	<div class="col-xs-12">
 		<div class="date">
	 		<span class="day"><?php echo date('d', strtotime($article->getCreatedAt())); ?></span>
	 		<span class="month"><?php echo __(date('M', strtotime($article->getCreatedAt()))); ?></span>
	 		<!-- <span class="year">2015</span> -->
 		</div>
 		<div class="news-title">
 			<?php echo $article->getTitle(); ?>
 		</div>
 	</div>

    <?php if (null !== $article->getPicture()): ?>

    <div class="col-xs-12 col-md-5 img-cont">
        <img class="thumbnail" src="<?php echo $article->retrievePictureUrl(); ?>">
    </div>

    <div class="col-xs-12 col-md-7 content-part">
    	<div class="row">
    		<div class="col-xs-12 home-pitch"><strong><?php echo $article->getSubTitle(); ?></strong></div>
        	<div class="col-xs-12 home-content"><?php echo strip_tags($article->getContent(ESC_RAW)); ?></div>
        </div>
    </div>

    <?php else: ?>

        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12"><strong><?php echo $article->getSubTitle(); ?></strong></div>
                <div class="col-xs-12"><?php echo strip_tags($article->getContent(ESC_RAW)); ?></div>
            </div>
        </div>

    <?php endif; ?>

    <a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>#disqus_thread" class="coms-number"></a>
    <a href="<?php echo url_for('article_show', array('id' => $article->getId())); ?>" class="btn btn-primary btn-xs show-article"><?php echo __('voir la suite'); ?></a>

</div>

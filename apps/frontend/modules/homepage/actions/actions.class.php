<?php

/**
 * homapage actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageActions extends sfActions
{

	public function executeIndex(sfWebRequest $request)
	{
		//$this->articles = ArticleTable::getInstance()->findAll();

		$this->articles = new sfDoctrinePager('Article', sfConfig::get('app_pagination_max_article_per_page'));
             
        $articleQuery = ArticleTable::getInstance()->getArticleQuery();
        $this->articles->setQuery($articleQuery);
        
        $this->articles->setPage($request->getParameter('page', 1));
        $this->articles->init();
	}

}
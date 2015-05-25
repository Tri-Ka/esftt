<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActions extends sfActions
{

	public function executeIndex(sfWebRequest $request)
	{
		$this->redirect('admin_article_list');
	}

    public function executeArticleList(sfWebRequest $request)
    {
		$this->articles = new sfDoctrinePager('Article', sfConfig::get('app_pagination_max_item_admin'));
		$this->articles->setPage($request->getParameter('page', 1));
		$this->articles->init();
    }

    public function executeUserList(sfWebRequest $request)
    {
		$this->users = new sfDoctrinePager('sfGuardUser', sfConfig::get('app_pagination_max_item_admin'));
		$this->users->setPage($request->getParameter('page', 1));
		$this->users->init();
    }
}

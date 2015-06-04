<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
    	$this->userCount = sfGuardUserTable::getInstance()->findAll()->count();
    	$this->teamCount = TeamTable::getInstance()->findAll()->count();
    	$this->articleCount = ArticleTable::getInstance()->findAll()->count();
    	$this->eventCount = EventTable::getInstance()->findAll()->count();
    }

    public function executeSb()
    {
    	$this->setLayout('sb_admin');
    }
}

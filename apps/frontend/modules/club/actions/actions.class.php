<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clubActions extends sfActions
{
    public function executeShow(sfWebRequest $request)
    {
    	$this->teams = TeamTable::getInstance()->findAll();
    	$this->events = EventTable::getInstance()->findAll();
    }

    public function executeInfo(sfWebRequest $request)
    {
    }
}

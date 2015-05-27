<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
    	$this->users = new sfDoctrinePager('sfGuardUser', sfConfig::get('app_pagination_max_item_admin'));
		$this->users->setPage($request->getParameter('page', 1));
		$this->users->init();
    }

    public function executeNew($request)
	{

		$this->form = new sfGuardUserBackendForm();

		if ($this->form->bindAndValid($request)) {

			$user = $this->form->save();
			$this->getUser()->setFlash('notice', 'utilisateur créé');
			$this->redirect('user_list');
		}
	}

	public function executeEdit(sfWebRequest $request)
    {
    	$this->user = sfGuardUserTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new sfGuardUserBackendForm($this->user);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'utilisateur modifié');
            $this->redirect('user_list');
    	}
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('id'));
        $this->user->delete();
        $this->getUser()->setFlash('notice', 'utilisateur supprimé');
        $this->redirect('user_list');
    }
}

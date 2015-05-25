<?php

/**
 * user actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
	public function executeNew($request)
	{

		$this->form = new sfGuardUserFrontendForm();

		if ($this->form->bindAndValid($request)) {

			$user = $this->form->save();
			$this->getUser()->setFlash('notice', 'utilisateur créé');
			$this->redirect('admin');

		}
	}

	public function executeEdit(sfWebRequest $request)
    {
    	$this->user = sfGuardUserTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new sfGuardUserFrontendForm($this->user);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'utilisateur modifié');
    		$this->redirect('admin');

    	}
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('id'));
        $this->user->delete();
        $this->getUser()->setFlash('notice', 'utilisateur supprimé');
        $this->redirect('admin');
    }
}
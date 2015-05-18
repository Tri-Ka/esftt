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

                  $this->getUser()->signin($user);
                  $this->redirect('homepage');

            }

	}
}
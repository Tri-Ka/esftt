<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
    public function executeNew(sfWebRequest $request)
    {
    	$this->form = new contactForm();

    	if ($this->form->bindAndValid($request)) {

    		var_dump('ok');exit;

    	}

    }
}
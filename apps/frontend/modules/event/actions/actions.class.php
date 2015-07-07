<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends sfActions
{
   public function executeShow(sfWebRequest $request)
   {

   		$this->event = EventTable::getInstance()->find($request->getParameter('id'));

   }
}

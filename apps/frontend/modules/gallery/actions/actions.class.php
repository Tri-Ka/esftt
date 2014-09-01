<?php

/**
 * article actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryActions extends sfActions
{

	public function executeList(sfWebRequest $request)
	{

		$this->galleries = GalleryTable::getInstance()->findAll();

	}

	public function executeShow(sfWebRequest $request)
	{

		$this->forward404Unless($this->gallery = GalleryTable::getInstance()->find($request->getParameter('id')));

	}

}
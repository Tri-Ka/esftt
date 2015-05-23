<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{
    public function executeNew(sfWebRequest $request)
    {
    	$this->form = new ArticleFrontendForm();

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'article créé');

    		$this->redirect('admin');

    	}
    }

	public function executeEdit(sfWebRequest $request)
    {
    	$this->article = ArticleTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new ArticleFrontendForm($this->article);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'article modifié');
    		$this->redirect('admin');

    	}
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->article = ArticleTable::getInstance()->find($request->getParameter('id'));
        $this->article->delete();
        $this->getUser()->setFlash('notice', 'article supprimé');
        $this->redirect('admin');
    }
}

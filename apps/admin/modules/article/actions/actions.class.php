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
    public function executeList(sfWebRequest $request)
    {
        $this->articles = new sfDoctrinePager('Article', sfConfig::get('app_pagination_max_item_admin'));
        $this->articles->setQuery(ArticleTable::getInstance()->findForAdminQuery());
        $this->articles->setPage($request->getParameter('page', 1));
        $this->articles->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ArticleBackendForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'article créé');

            $this->redirect('article_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->article = ArticleTable::getInstance()->find($request->getParameter('id'));

        $this->form = new ArticleBackendForm($this->article);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'article modifié');
            $this->redirect('article_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->article = ArticleTable::getInstance()->find($request->getParameter('id'));
        $this->article->delete();
        $this->getUser()->setFlash('notice', 'article supprimé');
        $this->redirect('article_list');
    }
}

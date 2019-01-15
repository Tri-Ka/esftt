<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class coverActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->covers = new sfDoctrinePager('Cover', sfConfig::get('app_pagination_max_item_admin'));
        $this->covers->setPage($request->getParameter('page', 1));
        $this->covers->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new CoverForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'image de couverture créé');

            $this->redirect('cover_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->cover = CoverTable::getInstance()->find($request->getParameter('id'));

        $this->form = new CoverForm($this->cover);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'fichier modifié');
            $this->redirect('cover_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->cover = CoverTable::getInstance()->find($request->getParameter('id'));
        $this->cover->delete();
        $this->getUser()->setFlash('notice', 'fichier supprimé');
        $this->redirect('cover_list');
    }
}

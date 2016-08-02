<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fileActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->files = new sfDoctrinePager('File', sfConfig::get('app_pagination_max_item_admin'));
        $this->files->setPage($request->getParameter('page', 1));
        $this->files->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new FileForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'évènement créé');

            $this->redirect('file_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->file = FileTable::getInstance()->find($request->getParameter('id'));

        $this->form = new FileForm($this->file);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'fichier modifié');
            $this->redirect('file_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->file = FileTable::getInstance()->find($request->getParameter('id'));
        $this->file->delete();
        $this->getUser()->setFlash('notice', 'fichier supprimé');
        $this->redirect('file_list');
    }
}

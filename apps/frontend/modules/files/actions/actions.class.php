<?php

/**
 * file actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class filesActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->files = FileTable::getInstance()->findAll();
    }
}

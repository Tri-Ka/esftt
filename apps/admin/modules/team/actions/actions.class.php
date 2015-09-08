<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class teamActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
    	$this->teams = new sfDoctrinePager('Team', sfConfig::get('app_pagination_max_item_admin'));
		$this->teams->setPage($request->getParameter('page', 1));
		$this->teams->init();
    }

    public function executeNew(sfWebRequest $request)
    {
    	$this->form = new TeamForm();
        
        $groupIds = array(
            2, 
            3
        );

        $this->membersWithoutTeam = sfGuardUserTable::getInstance()->findUsersWithoutTeam($groupIds);
    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'team créée');

    		$this->redirect('team_edit', array('id' => $this->form->getObject()->getId()));

    	}
    }

	public function executeEdit(sfWebRequest $request)
    {
    	$this->team = TeamTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new TeamForm($this->team);

        $groupIds = array(
            2, 
            3
        );

        $this->membersWithoutTeam = sfGuardUserTable::getInstance()->findUsersWithoutTeam($groupIds);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'team modifiée');
    		$this->redirect('team_list');

    	}
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->team = TeamTable::getInstance()->find($request->getParameter('id'));
        $this->team->delete();
        $this->getUser()->setFlash('notice', 'team supprimée');
        $this->redirect('team_list');
    }

    public function executeDeleteUser(sfWebRequest $request)
    {
        $this->team = TeamTable::getInstance()->find($request->getParameter('teamId'));
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('userId'));

        $this->teamUser = UserTeamTable::getInstance()->findOneByUserIdAndTeamId($this->user->getId(), $this->team->getId());
        $this->teamUser->delete();

        $this->redirect('team_edit', array('id' => $this->team->getId()));
    }

    public function executeNameCaptain(sfWebRequest $request)
    {
        $this->team = TeamTable::getInstance()->find($request->getParameter('teamId'));
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('userId'));

        $this->teamUser = UserTeamTable::getInstance()->findOneByUserIdAndTeamId($this->user->getId(), $this->team->getId());
        $this->teamUser->setIsCaptain(true);
        $this->teamUser->save();

        $this->redirect('team_edit', array('id' => $this->team->getId()));
    }

    public function executeRemoveCaptain(sfWebRequest $request)
    {
        $this->team = TeamTable::getInstance()->find($request->getParameter('teamId'));
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('userId'));

        $this->teamUser = UserTeamTable::getInstance()->findOneByUserIdAndTeamId($this->user->getId(), $this->team->getId());
        $this->teamUser->setIsCaptain(false);
        $this->teamUser->save();

        $this->redirect('team_edit', array('id' => $this->team->getId()));
    }

    public function executeAddTeamUser(sfWebRequest $request)
    {
        $this->team = TeamTable::getInstance()->find($request->getParameter('teamId'));
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('userId'));

        $this->teamUser = new UserTeam();
        $this->teamUser->setTeamId($this->team->getId());
        $this->teamUser->setUserId($this->user->getId());
        $this->teamUser->save();

        $this->redirect('team_edit', array('id' => $this->team->getId()));
    }

}

<?php

/**
 * competition actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class compoActions extends sfActions
{

	public function executeShow(sfWebRequest $request){

		// $this->competitionSessions = CompetitionSessionTable::getInstance()->findAll();

		// $teams = $this->competitionSessions->getFirst()->getCompetitionSessionTeams();

		// if($this->competitionSessions->getFirst()){

		// 	$userAvailables = sfGuardUserTable::getInstance()->findAvailableBySessionId($this->competitionSessions->getFirst());
		// 	$userUnAvailables = sfGuardUserTable::getInstance()->findUnAvailableBySessionId($this->competitionSessions->getFirst());

		// }
	}

}

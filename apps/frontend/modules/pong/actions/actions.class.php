<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pongActions extends sfActions
{
   public function executePong(sfWebRequest $request)
   {
		$this->bestScores = PongScoreTable::getInstance()->findBests();
   }

   public function executeAddScore(sfWebRequest $request)
   {
		if (null != $request->getParameter('playername')) {

         $score = new PongScore();

			$playername = $request->getParameter('playername');

			$score->setPlayername(strtoupper($playername));
			$score->setScore($request->getParameter('score'));	
			$score->save();

		}
		
		$this->bestScores = PongScoreTable::getInstance()->findBests();
   }
   
}

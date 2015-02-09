<?php

/**
 * calendar actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarActions extends sfActions
{

	public function executeShow(sfWebRequest $request)
	{

	}

	public function executeGetEvents(sfWebRequest $request)
	{
		$events = array(

			array(
				'title' => 'event1',
				'start' => '2015-01-01'
			),s
			array(
				'title' => 'event2',
				'start' => '2015-01-05',
				'end' => '2015-01-07'
			),
			array(
				'title' => 'event3',
				'start' => '2015-01-09T12:30:00',
				'allDay' => false
			)

		);

		return $this->renderText(json_encode($events));
	}

}
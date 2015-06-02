<?php

/**
 * Event form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EventForm extends BaseEventForm
{
	public function configure()
	{

	}

	public function bind(array $taintedValues = null, array $taintedFiles = null)
    {  
       	$date_from = $taintedValues['date_from'];
    	$day_from = substr($date_from, 0, 2);
    	$month_from = substr($date_from, 3, 2);
    	$year_from = substr($date_from, 6, 4);
    	$hour_from = substr($date_from, 11, 5);

    	$date_to = $taintedValues['date_to'];
    	$day_to = substr($date_to, 0, 2);
    	$month_to = substr($date_to, 3, 2);
    	$year_to = substr($date_to, 6, 4);
    	$hour_to = substr($date_to, 11, 5);
    	
    	$new_from_format = $year_from.'-'.$month_from.'-'.$day_from.' '.$hour_from;
    	$new_to_format = $year_to.'-'.$month_to.'-'.$day_to.' '.$hour_to;

    	$taintedValues['date_from'] = $new_from_format;
    	$taintedValues['date_to'] = $new_to_format;

        parent::bind($taintedValues, $taintedFiles);
    }

}

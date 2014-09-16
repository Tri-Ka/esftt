<?php

/**
 * BigTopic form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BigTopicFrontendForm extends BigTopicForm
{
  public function configure()
  {

	$this->widgetSchema['category_id'] = new sfWidgetFormInputHidden();

	$this->setDefault('category_id', $this->getOption('category_id'));

  }
}

<?php

/**
 * InfoElement filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInfoElementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'    => new sfValidatorPass(array('required' => false)),
      'content'  => new sfValidatorPass(array('required' => false)),
      'position' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('info_element_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InfoElement';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'title'    => 'Text',
      'content'  => 'Text',
      'position' => 'Number',
    );
  }
}

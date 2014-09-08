<?php

/**
 * Info filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'street'  => new sfWidgetFormFilterInput(),
      'city'    => new sfWidgetFormFilterInput(),
      'zipcode' => new sfWidgetFormFilterInput(),
      'phone'   => new sfWidgetFormFilterInput(),
      'email'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'address' => new sfValidatorPass(array('required' => false)),
      'street'  => new sfValidatorPass(array('required' => false)),
      'city'    => new sfValidatorPass(array('required' => false)),
      'zipcode' => new sfValidatorPass(array('required' => false)),
      'phone'   => new sfValidatorPass(array('required' => false)),
      'email'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Info';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'address' => 'Text',
      'street'  => 'Text',
      'city'    => 'Text',
      'zipcode' => 'Text',
      'phone'   => 'Text',
      'email'   => 'Text',
    );
  }
}

<?php

/**
 * PriceCategory filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePriceCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'position' => new sfWidgetFormFilterInput(),
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'position' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('price_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PriceCategory';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'position' => 'Number',
      'name'     => 'Text',
    );
  }
}

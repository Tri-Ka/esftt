<?php

/**
 * BasePriceCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $position
 * @property string $name
 * @property Doctrine_Collection $Prices
 * 
 * @method integer             getPosition() Returns the current record's "position" value
 * @method string              getName()     Returns the current record's "name" value
 * @method Doctrine_Collection getPrices()   Returns the current record's "Prices" collection
 * @method PriceCategory       setPosition() Sets the current record's "position" value
 * @method PriceCategory       setName()     Sets the current record's "name" value
 * @method PriceCategory       setPrices()   Sets the current record's "Prices" collection
 * 
 * @package    esftt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePriceCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('price_category');
        $this->hasColumn('position', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('PriceElement as Prices', array(
             'local' => 'id',
             'foreign' => 'category_id'));
    }
}
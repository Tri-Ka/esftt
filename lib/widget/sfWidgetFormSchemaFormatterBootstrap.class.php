<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormSchemaFormatterList.class.php 5995 2007-11-13 15:50:03Z fabien $
 */
class sfWidgetFormSchemaFormatterBootstrapForm extends sfWidgetFormSchemaFormatter
{

    protected
        $rowFormat = "<div class=\"form-group\">\n  %error%%label%\n  %field%%help%\n%hidden_fields%</div>\n",
        $errorRowFormat = "<li>\n%errors%</li>\n",
        $helpFormat = '<p class="help">%help%</p>',
        $decoratorFormat = "<div class=\"form-group\">\n  %content%</div>",
        $requiredLabelClass = 'required',
        $lastWidget = null;


    /**
   * Constructor
   *
   * @param sfWidgetFormSchema $widgetSchema
   */
    public function __construct(sfWidgetFormSchema $widgetSchema)
    {
        foreach ($widgetSchema->getFields() as $field){

            $field->setAttribute('class', 'form-control');

        }

        $this->setWidgetSchema($widgetSchema);
    }


}

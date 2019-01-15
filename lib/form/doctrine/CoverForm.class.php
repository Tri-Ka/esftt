<?php

/**
 * Cover form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CoverForm extends BaseCoverForm
{
    public function configure()
    {
        $this->usefields(array(
            'file_name',
            'position'
        ));

        $this->widgetSchema['file_name'] = new sfWidgetFormInputFileEditable(array(
            'file_src' => $this->getObject()->retrieveFileUrl(),
            'template' => '%input%<br />%delete% %delete_label%',
        ));

        $this->validatorSchema['file_name'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir').'/files/files', ));

        $this->validatorSchema['file_delete'] = new sfValidatorPass();
        $this->widgetSchema['file_name']->setLabel('pièce jointe');
    }

    public function doSave($con = null)
    {
        parent::doSave($con);

        $file = $this->getObject();
        $fileInfo = $this->getValue('file_name');

        if (null !== $fileInfo) {
            $directory = $file->retrieveFileDirectory(false);

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            if (file_exists($fileInfo->getSavedName())) {
                copy($fileInfo->getSavedName(), $file->retrieveFileUrl(false));
                unlink($fileInfo->getSavedName());
            }
        }

        $this->getObject()->refresh(true);
    }
}

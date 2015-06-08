<?php

/**
 * Event form.
 *
 * @author     Your name here
 *
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EventForm extends BaseEventForm
{
    public function configure()
    {
        $this->usefields(array(
            'name',
            'picture',
            'description',
            'date_from',
            'date_to',
        ));

        // avatar
        $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
          'file_src' => $this->getObject()->retrievePictureUrl(),
          'is_image' => true,
          'edit_mode' => !$this->isNew() && null != $this->getObject()->getPicture(),
          'template' => '<div class="img-thumbnail marged-bottom">%file%</div>%input%',
        ));

        $this->validatorSchema['picture'] = new sfValidatorFileImage(array(
            'required'   => false,
            'path'       => sfConfig::get('sf_upload_dir').'/events',
            'min_height' =>  0,
            'min_width'  =>  0,
            'max_height' =>  99999999,
            'max_width'  =>  99999999,
            'mime_types' => 'web_images',
        ));
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

    public function doSave($con = null)
    {
        parent::doSave($con);

        $event = $this->getObject();

        $directory = $event->retrieveHashedPictureDirectory(false);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $sizes = sfConfig::get('app_imagesizes_event_picture');
        $picture = $this->getValue('picture');

        if (!is_null($picture)) {
            $old = $picture->getSavedName();
            $img = new sfImage($old, $picture->getType());

            $img->thumbnail($sizes['width'], $sizes['height'], 'center');
            $img->saveAs($directory.DIRECTORY_SEPARATOR.$event->getPicture());

            @unlink($old);
        }

        $this->getObject()->refresh(true);
    }
}

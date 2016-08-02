<?php

class ppstWidgetFormInputFileEditableFrontend extends sfWidgetFormInputFileEditable
{
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);
        $this->addOption('file_download_txt', '');
    }

    protected function getFileAsTag($attributes)
    {
        if ($this->getOption('is_image')) {
            return false !== $this->getOption('file_src') ? $this->renderTag('img', array_merge(array('src' => $this->getOption('file_src')), $attributes)) : '';
        } else {
            return false !== $this->getOption('file_src') ?
                sprintf(
                    '<a href="%s" class="btn btn-info btn-block"> <i class="icon-cloud-download"></i> %s</a>',
                    $this->getOption('file_src'),
                    $this->getOption('file_download_txt')
                ) : '';
        }
    }
}

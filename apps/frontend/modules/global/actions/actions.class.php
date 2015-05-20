<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class globalActions extends sfActions
{
    public function executeInfo(sfWebRequest $request)
    {
    }

    public function executeGallery(sfWebRequest $request)
    {
        if (true == $request->hasParameter('folder')) {
            $sublFolder = DIRECTORY_SEPARATOR.$request->getParameter('folder');
        } else {
            $sublFolder = '';
        };

        $this->galleryDir = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'gallery';
        $this->currentDir = $this->galleryDir.$sublFolder;
        $this->dirs = glob($this->currentDir.'/*', GLOB_ONLYDIR);
        $this->directories = array();

        foreach ($this->dirs as $directory) {
            $foldersImages = glob($directory.DIRECTORY_SEPARATOR."*.jpg");

            $directoryName = str_replace($this->currentDir.DIRECTORY_SEPARATOR, '', $directory);
            $imageName = str_replace($this->currentDir.DIRECTORY_SEPARATOR.$directoryName, '', $foldersImages[0]);

            $this->directories[] = array(
                'name' => $directoryName,
                'path' => str_replace($this->galleryDir, '', $directory),
                'picture' => $imageName ,
            );
        }

        $images = glob($this->currentDir.DIRECTORY_SEPARATOR."*.jpg");

        $this->pictures = array();

        foreach ($images as $image) {
            $directoryName = $request->getParameter('folder');
            $imageName = str_replace($this->currentDir, '', $image);

            $this->pictures[] = array(
                'name' => $imageName,
                'path' => $directoryName,
            );
        }
    }
}

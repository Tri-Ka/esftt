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
            $foldersImages = array_merge(
                glob($directory.DIRECTORY_SEPARATOR."*.jpg"),
                glob($directory.DIRECTORY_SEPARATOR."*.JPG")
            );

            $directoryName = str_replace($this->currentDir.DIRECTORY_SEPARATOR, '', $directory);

            if (0 < count($foldersImages)) {
                $imageName = str_replace($this->currentDir.DIRECTORY_SEPARATOR.$directoryName, '', $foldersImages[0]);
            } else {
               $imageName = ''; 
            }

            $this->directories[] = array(
                'name' => $directoryName,
                'path' => str_replace($this->galleryDir, '', $directory),
                'picture' => $imageName ,
            );
        }

        $images = array_merge(
            glob($this->currentDir.DIRECTORY_SEPARATOR."*.jpg"),
            glob($this->currentDir.DIRECTORY_SEPARATOR."*.JPG")
        );

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

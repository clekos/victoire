<?php

namespace Victoire\Bundle\MediaBundle\Helper;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * BulkUploadHelper
 */
class BulkUploadHelper
{

    /**
     * @var UploadedFile[]
     */
    public $files = array();

    /**
     * @param UploadedFile[] $files
     *
     * @return BulkUploadHelper
     */
    public function setFiles($files)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * @return UploadedFile[]
     */
    public function getFiles()
    {
        return $this->files;
    }
}

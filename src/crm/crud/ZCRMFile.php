<?php

namespace zcrmsdk\crm\crud;

use zcrmsdk\crm\api\handler\FileUploadApiHandler;

class ZCRMFile
{
    private $id;
    private $name;

    /**
     * Method to get the instance of the field
     *
     * @return ZCRMFile
     */
    public static function getInstance()
    {
        return new ZCRMFile();
    }

    public static function uploadFile($filePath)
    {
        $response = FileUploadApiHandler::getInstance()->uploadFile($filePath);

        $file = new ZCRMFile();
        $file->setId($response->getData()['id']);
        $file->setName($response->getData()['name']);

        return $file;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}

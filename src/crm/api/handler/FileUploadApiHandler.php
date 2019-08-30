<?php

namespace zcrmsdk\crm\api\handler;

use zcrmsdk\crm\api\APIRequest;
use zcrmsdk\crm\exception\APIExceptionHandler;
use zcrmsdk\crm\exception\ZCRMException;
use zcrmsdk\crm\utility\APIConstants;

class FileUploadApiHandler extends APIHandler
{
    public static function getInstance()
    {
        return new FileUploadApiHandler();
    }

    public function uploadFile($filePath)
    {
        try {
            $this->requestMethod = APIConstants::REQUEST_METHOD_POST;
            $this->urlPath = 'files';

            $responseInstance = APIRequest::getInstance($this)->uploadFile($filePath);
            $responseJson = $responseInstance->getResponseJSON();
            $detailsJSON = isset($responseJson['data'][0]['details']) ? $responseJson['data'][0]['details'] : array();
            $responseInstance->setData($detailsJSON);

            return $responseInstance;
        } catch (ZCRMException $exception) {
            APIExceptionHandler::logException($exception);
            throw $exception;
        }
    }
}

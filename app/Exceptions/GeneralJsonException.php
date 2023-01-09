<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeneralJsonException extends Exception
{
    public function report()
    {
        

    }
    public function render($request)
    {
        return new JsonResponse([
            'error'=>[
                'message'=>$this->getMessage()
            ]
        ], $this->getCode());

    }
}

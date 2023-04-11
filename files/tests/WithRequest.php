<?php

namespace Tests;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

trait WithRequest
{    
    protected function getRequest(array $data = []): Request
    {
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        return $request->setJson(new ParameterBag($data));
    }
}

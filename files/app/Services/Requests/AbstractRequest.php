<?php

declare(strict_types=1);

namespace App\Services\Requests;

use Illuminate\Http\Request;

abstract class AbstractRequest
{
    protected Request $request;

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Http\Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}

<?php

namespace App\Middlewares;
use hisorange\BrowserDetect\Parser as Browser;
use App\Middlewares\Contracts\MiddlewareInterface;
class BlockEdge implements MiddlewareInterface
{
    public function handle()
    {
        if (Browser::isEdge())
            return die("Your Browser Has Been Blocked !!!");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/7
 * Time: 17:39
 */

namespace Listener;

use Event\ResponseEvent;

class ContentLengthListener
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;
        if(!$headers->has('Content-Length')
            && !$headers->has('Transfer-Encoding')
        ) {
            $headers->set('Content-Length', strlen($response->getContent()));
        }
    }
}
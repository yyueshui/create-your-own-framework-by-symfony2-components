<?php

/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/7
 * Time: 17:31
 */
namespace Listener;

use Event\ResponseEvent;

class GoogleListener
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        if($response->isRedirection()
            || ($response->headers->has('Content-Type') && false === strpos($response->headers->get('Content-Type'), 'html'))
            || 'html' !== $event->getRequest()->getRequestFormat()
        ) {
            return;
        }

        $response->setContent($response->getContent().'GA CODE');
    }
}
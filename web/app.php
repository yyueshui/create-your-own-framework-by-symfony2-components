<?php
/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/4
 * Time: 14:23
 */
require_once __DIR__.'/../src/autoload.php';
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Felix\Framework;
use Symfony\Component\EventDispatcher\EventDispatcher;


$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/routing.php';
$sc = include __DIR__.'/../src/container.php';
//$event = new EventDispatcher();
//
//$context = new Routing\RequestContext();
//$context->fromRequest($request);
//$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
//$resolver = new HttpKernel\Controller\ControllerResolver();
//
//$event->addSubscriber(new RouterListener($matcher));
//$listener = new HttpKernel\EventListener\ExceptionListener(
//    'Calendar\\Controller\\ErrorController::exceptionAction'
//);
//$event->addSubscriber(new ContentLengthListener());
//$event->addSubscriber(new GoogleListener());
//$event->addListener('response', array(
//    new ContentLengthListener(),
//    'onResponse'
//), -255);
//$event->addListener('response', array(
//    new GoogleListener(),
//    'onResponse'
//));

//$framework = new Framework($matcher, $resolver, $event);
//$framework = new HttpCache($framework, new Store(__DIR__.'/../cache'));
//$response = $framework->handle($request);
//$framework = new Framework($routes);
//$response = $framework->handle($request)->send();
//$response->send();

$response = $sc->get('framework')->handle($request);

$response->send();



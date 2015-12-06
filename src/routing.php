<?php
/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/4
 * Time: 15:35
 */

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$routers = new Routing\RouteCollection();
$routers->add('hello', new Routing\Route('/hello/{name}' ,array(
    'name'=>'felix',
    '_controller' => function(Request $request){
        $request->attributes->set('foo', 'bar');
        $response = render_template($request);
        // 改变一些头信息
        $response->headers->set('Content-Type', 'text/plain');

        return $response;
    }
)));


$routers->add('bye', new Routing\Route('/bye'));


$routers->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\\Controller\\LeapYearController::indexAction'
)));
return $routers;

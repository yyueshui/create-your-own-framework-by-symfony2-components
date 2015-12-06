<?php

/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/4
 * Time: 17:53
 */
namespace Felix;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Event\ResponseEvent;

class Framework
{
    protected $matcher;
    protected $resolver;

	protected $dispatcher;

    public function __construct(
	    UrlMatcherInterface $matcher,
	    ControllerResolverInterface $resolver,
		EventDispatcher $dispatcher
    ){
        $this->matcher = $matcher;
        $this->resolver = $resolver;
	    $this->dispatcher = $dispatcher;
    }

    public function handle(Request $request)
    {
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));

            $controller = $this->resolver->getController($request);
	        if($controller) {
		        $arguments = $this->resolver->getArguments( $request, $controller );
		        $response = call_user_func_array( $controller, $arguments );
	        } else {
		        $response = new Response('bye');
	        }
        } catch(ResourceNotFoundException $e) {
            $response = new Response('Not Found', 404);
        } catch(\Exception $e) {
            $response = new Response('An error occured', 500);
        }

	    $this->dispatcher->addListener('response', new ResponseEvent($request, $response));

	    return $response;
    }
}
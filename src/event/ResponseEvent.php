<?php

/**
 * ResponseEvent.php
 * @Date       : 2015/12/6 13:21
 * @author     : felix
 * @description:
 */
namespace Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\Event;

class ResponseEvent extends Event
{
	private $request;
	private $response;

	public function __construct (Request $request, Response $response)
	{
		$this->response = $response;
		$this->request = $request;
	}

	public function getResponse()
	{
		return $this->response;
	}

	public function getRequest()
	{
		return $this->request;
	}
}
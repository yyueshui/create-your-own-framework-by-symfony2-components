<?php

/**
 * FrameworkTest.php
 * @Date       : 2015/12/5 15:01
 * @author     : felix
 * @description:
 */


namespace Felix\Tests;

use Felix\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class FrameworkTest extends \PHPUnit_Framework_TestCase
{
	public function testNotFoundHandling()
	{
		$framework = $this->getFrameworkForException(new ResourceNotFoundException());

		$response = $framework->handle(new Request());

		$this->assertEquals(404, $response->getStatusCode());
	}

	protected function getFrameworkForException($exception)
	{
		$matcher = $this->getMock('Symfony\Component\Routing\Matcher\UrlMatcherInterface');
		$matcher
			->expects($this->once())
			->method('match')
			->will($this->throwException($exception))
		;
		$resolver = $this->getMock(
			'Symfony\Component\HttpKernel\Controller\ControllerResolverInterface'
		);

		return new Framework($matcher, $resolver);
	}
}
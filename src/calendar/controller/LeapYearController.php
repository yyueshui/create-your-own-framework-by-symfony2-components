<?php

/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/4
 * Time: 18:11
 */
namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Calendar\Model\LeapYear;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        $leapyear = new LeapYear();
        if ($leapyear->isLeapYear($year)) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/4
 * Time: 18:10
 */
namespace Calendar\Model;

class LeapYear
{
    public function isLeapYear($year = null)
    {
        if (null === $year) {
            $year = date('Y');
        }
        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}
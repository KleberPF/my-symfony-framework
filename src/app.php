<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

function isLeapYear($year = null)
{
    if ($year === null) {
        $year = date('Y');
    }

    return $year % 400 === 0 || ($year % 100 !== 0 && $year % 4 === 0);
}

class LeapYearController
{
    public function index($year)
    {
        if (isLeapYear($year)) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
}

$routes = new RouteCollection();
$routes->add('leap_year', new Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
]));

return $routes;

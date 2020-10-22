<?php
declare(strict_types = 1);

namespace Jalismrs\HelpersRequestBundle;

use Jalismrs\ErrorBundle\AssertionError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class RequestHelpers
 *
 * @package Jalismrs\HelpersRequestBundle
 */
class RequestHelpers
{
    public const ROUTE_ATTRIBUTE = '_route';
    
    /**
     * getRequest
     *
     * @static
     *
     * @param \Symfony\Component\HttpFoundation\RequestStack $requestStack
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public static function getRequest(
        RequestStack $requestStack
    ) : Request {
        $request = $requestStack->getCurrentRequest();
        if (!$request instanceof Request) {
            throw new AssertionError(
                'no request'
            );
        }
        
        return $request;
    }
    
    /**
     * getRouteName
     *
     * @static
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return string|null
     */
    public static function getRouteName(
        Request $request
    ) : ?string {
        return $request
            ->attributes
            ->get(self::ROUTE_ATTRIBUTE);
    }
}

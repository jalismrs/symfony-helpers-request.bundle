<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Common\Helpers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use UnexpectedValueException;

/**
 * Class RequestHelpers
 *
 * @package Jalismrs\Symfony\Common\Helpers
 */
class RequestHelpers
{
    public const ATTRIBUTE_ROUTE = '_route';
    
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
            throw new UnexpectedValueException(
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
            ->get(self::ATTRIBUTE_ROUTE);
    }
}

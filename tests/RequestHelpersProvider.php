<?php
declare(strict_types = 1);

namespace Tests;

use Jalismrs\Symfony\Common\Helpers\RequestHelpers;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequestHelpersProvider
 *
 * @package Tests
 */
final class RequestHelpersProvider
{
    public const ROUTE = 'route';

    /**
     * provideGetRouteName
     *
     * @return array
     */
    public function provideGetRouteName() : array
    {
        return [
            'without route' => [
                'input'  => new Request(),
                'output' => null,
            ],
            'without route: different name in same bag' => [
                'input'  => new Request(
                    [],
                    [],
                    [
                        'route' => self::ROUTE,
                    ]
                ),
                'output' => null,
            ],
            'without route: same name in different bag' => [
                'input'  => new Request(
                    [
                        RequestHelpers::ATTRIBUTE_ROUTE => self::ROUTE,
                    ]
                ),
                'output' => null,
            ],
            'with route'                                => [
                'input'  => new Request(
                    [],
                    [],
                    [
                        RequestHelpers::ATTRIBUTE_ROUTE => self::ROUTE,
                    ]
                ),
                'output' => self::ROUTE,
            ],
        ];
    }

    /**
     * provideExtractRoutePrefix
     *
     * @return array
     */
    public function provideExtractRoutePrefix() : array
    {
        return [
            'data'    => [
                'input'  => new Request(
                    [],
                    [],
                    [
                        RequestHelpers::ATTRIBUTE_ROUTE => 'api_data_',
                    ]
                ),
                'output' => 'data',
            ],
            'parc'    => [
                'input'  => new Request(
                    [],
                    [],
                    [
                        RequestHelpers::ATTRIBUTE_ROUTE => 'api_parc_',
                    ]
                ),
                'output' => 'parc',
            ],
            'team'    => [
                'input'  => new Request(
                    [],
                    [],
                    [
                        RequestHelpers::ATTRIBUTE_ROUTE => 'api_team_',
                    ]
                ),
                'output' => 'team',
            ],
        ];
    }
}

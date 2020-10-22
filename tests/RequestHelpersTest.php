<?php
declare(strict_types = 1);

namespace Tests;

use Jalismrs\ErrorBundle\AssertionError;
use Jalismrs\HelpersRequestBundle\RequestHelpers;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class RequestHelpersTest
 *
 * @package Tests
 *
 * @covers  \Jalismrs\HelpersRequestBundle\RequestHelpers
 */
final class RequestHelpersTest extends
    TestCase
{
    /**
     * testGetRequest
     *
     * @return void
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testGetRequest() : void
    {
        // arrange
        $request          = new Request();
        $testRequestStack = new RequestStack();
        
        $testRequestStack->push($request);
        
        // act
        $output = RequestHelpers::getRequest($testRequestStack);
        
        // assert
        self::assertSame(
            $request,
            $output
        );
    }
    
    /**
     * testGetRequestThrowsAssertionError
     *
     * @return void
     */
    public function testGetRequestThrowsAssertionError() : void
    {
        // arrange
        $testRequestStack = new RequestStack();
        
        // expect
        $this->expectException(AssertionError::class);
        $this->expectExceptionMessage('no request');
        
        // act
        RequestHelpers::getRequest($testRequestStack);
    }
    
    /**
     * testGetRouteName
     *
     * @param \Symfony\Component\HttpFoundation\Request|null $providedInput
     * @param string|null                                    $providedOutput
     *
     * @return void
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @dataProvider \Tests\RequestHelpersProvider::provideGetRouteName
     */
    public function testGetRouteName(
        Request $providedInput,
        ?string $providedOutput
    ) : void {
        // act
        $output = RequestHelpers::getRouteName($providedInput);
        
        // assert
        self::assertSame(
            $providedOutput,
            $output
        );
    }
}

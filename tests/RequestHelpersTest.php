<?php
declare(strict_types = 1);

namespace Tests;

use Jalismrs\Symfony\Common\Helpers\RequestHelpers;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use UnexpectedValueException;

/**
 * Class RequestHelpersTest
 *
 * @package Tests
 *
 * @covers  \Jalismrs\Symfony\Common\Helpers\RequestHelpers
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
     * testGetRequestThrowsUnexpectedValueException
     *
     * @return void
     */
    public function testGetRequestThrowsUnexpectedValueException() : void
    {
        // arrange
        $testRequestStack = new RequestStack();
        
        // expect
        $this->expectException(UnexpectedValueException::class);
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

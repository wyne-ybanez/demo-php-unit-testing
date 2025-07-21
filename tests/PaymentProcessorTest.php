<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PaymentProcessorTest extends TestCase
{
    public function testChargeIsMockedButLogTransactionIsReal(): void
    {
        // this is using the class' contructor method hence why its disabled
        // mock builder for more control over our mock object
        $processor = $this->getMockBuilder(PaymentProcessor::class)
                          ->onlyMethods(['charge'])
                          ->disableOriginalConstructor()
                          ->getMock();
        $amount = 100;

        $processor->expects($this->once())
                  ->method('charge')
                  ->with($amount)
                  ->willReturn("Mocked charge $amount");

        $this->assertSame("Mocked charge $amount", $processor->charge(100));

        $this->expectOutputString("Transaction for $amount logged");

        $processor->logTransaction(100);
    }
}
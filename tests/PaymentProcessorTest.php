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

    public function testApiKeyIsUsedToChargeTheAmount(): void
    {
        $processor = new PaymentProcessor('an-API-key');

        $result = $processor->charge(12.34);

        $this->assertSame('Charged 12.34 using API key an-API-key', $result);
    }
}

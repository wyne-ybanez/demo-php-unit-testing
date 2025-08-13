<?php

declare(strict_types=1);

use Mockery\Adapter\Phpunit\MockeryTestCase;

final class WeatherServiceTest extends MockeryTestCase
{
    public function testGetTemperatureForCity(): void
    {
        // create mock object that doesn't exist yet
        $mock_api_client = Mockery::mock('WeatherApiClient');

        $mock_api_client->shouldReceive('fetchCurrentWeather')
                        ->once()
                        ->with('Berlin')
                        ->andReturn(['temperature' => 18]);

        $service = new WeatherService($mock_api_client);

        $this->assertSame('18°C', $service->getTemperatureForCity('Berlin'));
    }
}

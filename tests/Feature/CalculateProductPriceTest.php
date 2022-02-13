<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculateProductPriceTest extends TestCase
{
//    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function itDoesntError(): void
    {
        $this->artisan('calculate-price')
            ->expectsQuestion('What is the product id?', 1)
            ->expectsQuestion('What is the venue id?', 1)
            ->expectsQuestion('What is the member id?', 1)
            ->expectsOutput('Calculating price for product: 1 from venue: 1 for user: 1')
            ->assertSuccessful();
    }
}

<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\Product;
use App\Models\Venue;
use App\Services\PriceEngine\Calculator;
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

    /**
     * In a real world scenario I would create a set of factories covering all types of modification with fixed results.
     *
     * @test
     * @return void
     */
    public function itCanCalculateAPrice(): void
    {
        $product = Product::find(1);
        $venue = Venue::find(1);
        $member = Member::find(1);

        $calculator = new Calculator($product, $venue, $member);

        $price = $calculator->calculate();

        $this->assertLessThanOrEqual($product->pricingOption->price, $price);
    }
}

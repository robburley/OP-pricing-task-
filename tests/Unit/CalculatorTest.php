<?php

namespace Tests\Unit;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Member;
use App\Models\Product;
use App\Models\Venue;
use App\Services\PriceEngine\Calculator;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
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

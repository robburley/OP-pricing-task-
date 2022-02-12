<?php

namespace App\Console\Commands;

use App\Models\Member;
use App\Models\Product;
use App\Models\Venue;
use App\Services\PriceEngine\Calculator;
use App\Services\PriceEngine\PriceFormatter;
use App\Services\PriceEngine\Validator;
use Illuminate\Console\Command;
use Illuminate\Validation\ValidationException;

class CalculateProductPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Takes user input of Product, Venue and User and calculates the price';

    /**
     * Execute the console command.
     *
     * @param  PriceFormatter $formatter
     * @return int
     */
    public function handle(PriceFormatter $formatter): int
    {
        $product = $this->ask('What is the product id?');
        $venue = $this->ask('What is the venue id?');
        $member = $this->ask('What is the member id?');

        $this->info(
            sprintf(
                'Calculating price for product: %s from venue: %s for user: %s',
                $product,
                $venue,
                $member
            )
        );

        try {
            if ((new Validator($product, $venue, $member))->handle()) {
                $calculator = new Calculator(
                    Product::find($product),
                    Venue::find($venue),
                    Member::find($member)
                );

                $this->info(
                    sprintf(
                        'Your price is: %s',
                        $formatter->format($calculator->calculate())
                    )
                );

                return 1;
            }
        } catch (ValidationException $e) {
            foreach ($e->errors() as $key => $errors) {
                $this->error(sprintf('%s: %s', $key, json_encode($errors)));
            }
        }

        return 0;
    }
}

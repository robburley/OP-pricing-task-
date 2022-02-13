<?php

namespace App\Services\PriceEngine;

use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\ValidationException;

class Validator
{
    private array $rules = [
        'product' => 'required|exists:products,id',
        'venue' => 'required|exists:venues,id',
        'member' => 'required|exists:members,id',
    ];

    public function __construct(
        private int $product,
        private int $venue,
        private int $member
    ) {
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     * @return bool
     */
    public function handle(): bool
    {
        $data = [
            'product' => $this->product,
            'venue' => $this->venue,
            'member' => $this->member,
        ];

        $validator = LaravelValidator::make($data, $this->rules);

        if ($validator->passes()) {
            return true;
        }

        throw new ValidationException($validator);
    }
}

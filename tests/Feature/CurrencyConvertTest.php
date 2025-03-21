<?php

namespace Tests\Feature;

use Tests\TestCase;

class CurrencyConvertTest extends TestCase
{
    public function test_currency_convert()
    {
        // 假資料
        $data = [
            'from_currency' => 'USD',
            'to_currency' => 'TWD',
            'amount' => 100,
        ];

        $response = $this->json('POST', 'api/currency/convert', $data);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'from_currency',
            'to_currency',
            'amount',
            'converted_amount',
            'rate',
        ]);

        $expectedConvertedAmount = 100 * 31.5;
        $response->assertJson([
            'from_currency' => 'USD',
            'to_currency' => 'TWD',
            'amount' => 100,
            'converted_amount' => $expectedConvertedAmount,
            'rate' => 31.5,
        ]);
    }
}

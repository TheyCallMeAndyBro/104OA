<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function convert(Request $request)
    {   
        $request->validate([
            'from_currency' => 'string|required',
            'to_currency' => 'string|required',
            'amount' => 'numeric|required',
        ]);
        
        $from_currency = $request->input('from_currency');
        $to_currency = $request->input('to_currency');
        $amount = $request->input('amount');
        
        $exchange_rate = $this->getExchangeRate($from_currency, $to_currency);
        $converted_amount = $amount * $exchange_rate;
        
        $data = [
            'from_currency' => $from_currency,
            'to_currency' => $to_currency,
            'amount' => $amount,
            'converted_amount' => $converted_amount,
            'rate' => $exchange_rate,
        ];
        
        return response()->json(new CurrencyResource($data));
    }

    // "last_updated": "2023-12-25T12:00:00Z"
    private function getExchangeRate($from_currency, $to_currency)
    {
        $exchangeRates = [
            'USD' => ['rates' => ['USD' => 1.0000, 'TWD' => 31.5000, 'JPY' => 148.5000]],
            'TWD' => ['rates' => ['USD' => 0.0317, 'TWD' => 1.0000, 'JPY' => 4.7143]],
            'JPY' => ['rates' => ['USD' => 0.00673, 'TWD' => 0.2121, 'JPY' => 1.0000]]
        ];

        return $exchangeRates[$from_currency]['rates'][$to_currency];
    }

}

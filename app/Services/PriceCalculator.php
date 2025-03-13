<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Product;
use InvalidArgumentException;

class PriceCalculator
{
    public function getCountryByTaxNumber(string $taxNumber)
    {
        if (strlen($taxNumber) < 2) {
            throw new InvalidArgumentException('Налоговый номер должен содержать как минимум 2 символа');
        }

        $countryCode = substr($taxNumber, 0, 2);
        $country = Country::where('code', $countryCode)->first();

        if (!$country) {
            throw new InvalidArgumentException('Страна с кодом ' . $countryCode . ' не найдена');
        }

        if (!preg_match($country->tax_number_pattern, $taxNumber)) {
            throw new InvalidArgumentException('Неверный формат налогового номера для ' . $country->name);
        }

        return $country;
    }

    public function calculatePrice(Product $product, Country $country)
    {
        $basePrice = $product->price;
        $taxAmount = $basePrice * ($country->tax_rate / 100);
        $totalPrice = $basePrice + $taxAmount;

        return [
            'product' => $product->name,
            'base_price' => $basePrice,
            'country' => $country->name,
            'tax_rate' => $country->tax_rate,
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
        ];
    }
}
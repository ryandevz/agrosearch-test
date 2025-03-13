<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\PriceCalculator;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ProductController extends Controller
{
    private PriceCalculator $priceCalculator;

    public function __construct(PriceCalculator $priceCalculator)
    {
        $this->priceCalculator = $priceCalculator;
    }

    public function index()
    {
        $products = Product::all();
        return view('price')->with('products', $products);
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tax_number' => 'required|string|min:11|max:13',
        ]);

        try {
            $product = Product::findOrFail($request->product_id);
            $country = $this->priceCalculator->getCountryByTaxNumber($request->tax_number);
            $result = $this->priceCalculator->calculatePrice($product, $country);

            return view('result')->with('result', $result);
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withErrors(['tax_number' => $e->getMessage()])->withInput();
        }
    }
}

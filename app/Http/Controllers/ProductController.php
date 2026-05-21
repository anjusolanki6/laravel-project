<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $summary = [
            'total' => Product::count(),
            'quantity' => Product::sum('quantity'),
            'value' => Product::query()->selectRaw('COALESCE(SUM(price * quantity), 0) as value')->value('value'),
        ];

        return view('products.index', compact('products', 'summary'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'product' => new Product([
                'code' => $this->generateProductCode(),
            ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($this->validatedProduct($request));

        return redirect()
            ->route('products.index')
            ->with('success', 'Product saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($this->validatedProduct($request, $product));

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function validatedProduct(Request $request, ?Product $product = null): array
    {
        $data = $request->validate([
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('products', 'code')->ignore($product?->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);

        $data['code'] = Str::upper($data['code']);

        return $data;
    }

    private function generateProductCode(): string
    {
        do {
            $code = 'PRD-' . now()->format('ymd') . '-' . Str::upper(Str::random(4));
        } while (Product::where('code', $code)->exists());

        return $code;
    }
}

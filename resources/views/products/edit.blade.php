@extends('layouts.app')

@section('content')
<section class="page-header">
    <div>
        <h1>Edit Product</h1>
        <p class="lede">Update saved product information and keep the product code unique.</p>
    </div>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">Back to List</a>
</section>

@include('products.form', [
    'product' => $product,
    'action' => route('products.update', $product),
    'method' => 'PUT',
    'buttonText' => 'Update Product',
])

@endsection

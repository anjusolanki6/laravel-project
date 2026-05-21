@extends('layouts.app')

@section('content')
<section class="page-header">
    <div>
        <h1>Create Product</h1>
        <p class="lede">Add a new product with a unique product code, stock quantity, and price.</p>
    </div>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">Back to List</a>
</section>

@include('products.form', [
    'product' => $product,
    'action' => route('products.store'),
    'method' => 'POST',
    'buttonText' => 'Save Product',
])

@endsection

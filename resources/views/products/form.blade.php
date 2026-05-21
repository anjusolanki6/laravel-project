<form class="product-form panel" action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="form-grid">
        <label>
            <span>Product Code</span>
            <input
                type="text"
                name="code"
                value="{{ old('code', $product->code) }}"
                placeholder="PRD-260521-ABCD"
                required
            >
        </label>

        <label>
            <span>Name</span>
            <input
                type="text"
                name="name"
                value="{{ old('name', $product->name) }}"
                placeholder="Product name"
                required
            >
        </label>

        <label>
            <span>Price</span>
            <input
                type="number"
                name="price"
                value="{{ old('price', $product->price) }}"
                placeholder="0.00"
                step="0.01"
                min="0"
                required
            >
        </label>

        <label>
            <span>Quantity</span>
            <input
                type="number"
                name="quantity"
                value="{{ old('quantity', $product->quantity) }}"
                placeholder="0"
                min="0"
                required
            >
        </label>
    </div>

    <label class="full">
        <span>Description</span>
        <textarea name="description" rows="5" placeholder="Short product details">{{ old('description', $product->description) }}</textarea>
    </label>

    <div class="form-actions">
        <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
        <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
    </div>
</form>

@push('styles')
<style>
    .product-form {
        padding: 22px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    label {
        display: grid;
        gap: 8px;
        color: var(--muted);
        font-weight: 800;
    }

    input,
    textarea {
        width: 100%;
        border: 1px solid var(--line);
        border-radius: var(--radius);
        padding: 12px 13px;
        color: var(--ink);
        font: inherit;
        font-weight: 500;
        background: #fff;
    }

    input:focus,
    textarea:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 3px rgba(15, 139, 141, .14);
        outline: none;
    }

    .full {
        margin-top: 16px;
    }

    .form-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    @media (max-width: 720px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>
@endpush

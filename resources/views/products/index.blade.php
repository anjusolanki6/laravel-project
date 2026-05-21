@extends('layouts.app')

@section('content')
<section class="page-header">
    <div>
        <h1>Products</h1>
        <p class="lede">Save product details, track quantity, and find items quickly from one clean list.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('products.create') }}">+ Add Product</a>
</section>

<section class="dashboard-grid" aria-label="Product summary">
    <div class="stat panel">
        <span>Total Products</span>
        <strong>{{ $summary['total'] }}</strong>
    </div>
    <div class="stat panel">
        <span>Total Quantity</span>
        <strong>{{ $summary['quantity'] }}</strong>
    </div>
    <div class="stat panel">
        <span>Inventory Value</span>
        <strong>Rs. {{ number_format($summary['value'], 2) }}</strong>
    </div>
</section>

<section class="panel table-panel">
    <div class="table-toolbar">
        <label for="productSearch">Search</label>
        <input id="productSearch" type="search" placeholder="Search by code, name, price, or quantity">
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
                @forelse($products as $product)
                    <tr>
                        <td><span class="code-pill">{{ $product->code ?: 'No code' }}</span></td>
                        <td>{{ $product->name }}</td>
                        <td>Rs. {{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="stock {{ $product->quantity <= 5 ? 'stock-low' : '' }}">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        <td>{{ $product->description ?: 'No description' }}</td>
                        <td class="actions">
                            <a class="btn btn-secondary" href="{{ route('products.edit', $product) }}">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-state">No products saved yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<div class="pagination-wrap">
    {{ $products->links() }}
</div>

@push('styles')
<style>
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 18px;
    }

    .stat {
        padding: 18px;
    }

    .stat span {
        display: block;
        color: var(--muted);
        font-weight: 700;
        font-size: 14px;
    }

    .stat strong {
        display: block;
        margin-top: 8px;
        font-size: 28px;
    }

    .table-panel {
        overflow: hidden;
    }

    .table-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 16px;
        border-bottom: 1px solid var(--line);
    }

    .table-toolbar label {
        font-weight: 800;
    }

    .table-toolbar input {
        width: min(380px, 100%);
        min-height: 42px;
        border: 1px solid var(--line);
        border-radius: var(--radius);
        padding: 0 12px;
        font: inherit;
    }

    .table-wrap {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 820px;
    }

    th,
    td {
        padding: 14px 16px;
        border-bottom: 1px solid var(--line);
        text-align: left;
        vertical-align: middle;
    }

    th {
        background: #f9fbfd;
        color: var(--muted);
        font-size: 13px;
        text-transform: uppercase;
    }

    .code-pill,
    .stock {
        display: inline-flex;
        align-items: center;
        min-height: 30px;
        border-radius: var(--radius);
        padding: 0 10px;
        background: #edf4f4;
        color: var(--brand-dark);
        font-weight: 800;
    }

    .stock {
        background: #eef7ed;
        color: #28733b;
    }

    .stock-low {
        background: #fff3d4;
        color: #8a6100;
    }

    .actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .actions form {
        margin: 0;
    }

    .empty-state {
        color: var(--muted);
        text-align: center;
        padding: 30px;
    }

    .pagination-wrap {
        margin-top: 18px;
    }

    .pagination-wrap nav > div:first-child {
        display: none;
    }

    .pagination-wrap nav > div:last-child,
    .pagination-wrap nav span,
    .pagination-wrap nav a {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .pagination-wrap nav a,
    .pagination-wrap nav span span {
        min-height: 36px;
        border: 1px solid var(--line);
        border-radius: var(--radius);
        padding: 0 12px;
        background: #fff;
    }

    .pagination-wrap svg {
        width: 18px;
        height: 18px;
    }

    @media (max-width: 760px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .table-toolbar {
            align-items: stretch;
            flex-direction: column;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    const searchInput = document.getElementById('productSearch');
    const productRows = Array.from(document.querySelectorAll('#productTable tr'));

    searchInput?.addEventListener('input', () => {
        const term = searchInput.value.trim().toLowerCase();

        productRows.forEach((row) => {
            row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
        });
    });
</script>
@endpush

@endsection

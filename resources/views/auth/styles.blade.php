@push('styles')
<style>
    .auth-wrap {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(320px, 430px);
        gap: 28px;
        align-items: start;
    }

    .auth-copy {
        padding-top: 26px;
    }

    .auth-card {
        display: grid;
        gap: 16px;
        padding: 24px;
    }

    .auth-card label {
        display: grid;
        gap: 8px;
        color: var(--muted);
        font-weight: 800;
    }

    .auth-card input[type="email"],
    .auth-card input[type="password"],
    .auth-card input[type="text"] {
        width: 100%;
        border: 1px solid var(--line);
        border-radius: var(--radius);
        padding: 12px 13px;
        color: var(--ink);
        font: inherit;
        font-weight: 500;
        background: #fff;
    }

    .auth-card input:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 3px rgba(15, 139, 141, .14);
        outline: none;
    }

    .check-row {
        display: flex !important;
        grid-template-columns: none;
        align-items: center;
        gap: 10px !important;
        color: var(--ink) !important;
        font-weight: 700 !important;
    }

    .check-row input {
        width: 18px;
        height: 18px;
    }

    .auth-link {
        margin: 0;
        color: var(--muted);
    }

    .auth-link a {
        color: var(--brand-dark);
        font-weight: 800;
    }

    @media (max-width: 760px) {
        .auth-wrap {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

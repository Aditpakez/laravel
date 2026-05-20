<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?: 'Dashboard' }} — SiAkademik</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --font: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            --bg: #fafafa;
            --surface: #ffffff;
            --border: #e5e5e5;
            --border-light: #f0f0f0;
            --text-primary: #171717;
            --text-secondary: #737373;
            --text-tertiary: #a3a3a3;
            --accent: #171717;
            --accent-hover: #262626;
            --blue: #2563eb;
            --blue-light: #eff6ff;
            --green: #16a34a;
            --green-light: #f0fdf4;
            --green-border: #bbf7d0;
            --red: #dc2626;
            --red-light: #fef2f2;
            --amber: #d97706;
            --amber-light: #fffbeb;
            --radius: 10px;
            --radius-sm: 6px;
            --radius-lg: 14px;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.04);
            --shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        /* ─── TOPBAR ─── */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            height: 56px;
        }

        .topbar-inner {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 24px;
            height: 100%;
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 700;
            font-size: 15px;
            letter-spacing: -0.3px;
            flex-shrink: 0;
            transition: opacity var(--transition);
        }
        .brand:hover { opacity: 0.8; }

        .brand-icon {
            width: 28px;
            height: 28px;
            background: var(--accent);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
        }

        .topbar-nav {
            display: flex;
            align-items: center;
            gap: 2px;
            height: 100%;
        }

        .topbar-nav a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--radius-sm);
            transition: color var(--transition), background var(--transition);
            height: 34px;
        }

        .topbar-nav a:hover {
            color: var(--text-primary);
            background: var(--border-light);
        }

        .topbar-nav a.active {
            color: var(--text-primary);
            font-weight: 600;
        }

        .topbar-nav a.active::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 14px;
            right: 14px;
            height: 2px;
            background: var(--text-primary);
            border-radius: 2px 2px 0 0;
            animation: slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideIn {
            from { transform: scaleX(0); opacity: 0; }
            to { transform: scaleX(1); opacity: 1; }
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--text-primary);
            cursor: pointer;
            padding: 4px;
            margin-left: auto;
        }

        /* ─── MAIN ─── */
        .main-content {
            flex: 1;
            max-width: 1120px;
            width: 100%;
            margin: 0 auto;
            padding: 32px 24px 64px;
            animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ─── PAGE HEADER ─── */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
        }

        .page-header-text h1 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.5px;
            line-height: 1.3;
            color: var(--text-primary);
        }

        .page-header-text p {
            font-size: 13.5px;
            color: var(--text-secondary);
            margin-top: 2px;
        }

        /* ─── BUTTONS ─── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            font-family: var(--font);
            font-size: 13px;
            font-weight: 600;
            border-radius: var(--radius-sm);
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            line-height: 1.4;
            white-space: nowrap;
            position: relative;
            transform: translateZ(0);
        }

        .btn:active {
            transform: scale(0.96);
        }

        .btn i { font-size: 14px; }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transform: translateY(-1px);
        }

        .btn-primary:active {
            transform: translateY(0) scale(0.96);
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--text-primary);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--border-light);
            border-color: #d4d4d4;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
        }

        .btn-danger {
            background: var(--surface);
            color: var(--red);
            border: 1px solid var(--border);
        }

        .btn-danger:hover {
            background: var(--red-light);
            border-color: #fecaca;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(220, 38, 38, 0.1);
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 12px;
        }

        /* ─── CARDS ─── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
        }

        a.card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -8px rgba(0,0,0,0.08), 0 4px 8px -4px rgba(0,0,0,0.04);
            border-color: #d4d4d4;
        }

        .card-header { padding: 20px 24px 0; }
        .card-header h2 { font-size: 16px; font-weight: 700; letter-spacing: -0.3px; }
        .card-header p { font-size: 13px; color: var(--text-secondary); margin-top: 2px; }
        .card-body { padding: 20px 24px 24px; }
        .card-body.flush { padding: 0; }

        /* ─── TABLES ─── */
        .data-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
        
        .data-table thead th {
            text-align: left;
            padding: 12px 16px;
            font-size: 11.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-tertiary);
            border-bottom: 1px solid var(--border);
            background: var(--bg);
        }

        .data-table tbody tr {
            border-bottom: 1px solid var(--border-light);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .data-table tbody tr:last-child { border-bottom: none; }

        .data-table tbody tr:hover {
            background: #f8fafc;
        }

        .data-table td {
            padding: 14px 16px;
            vertical-align: middle;
        }

        .data-table .col-num { width: 48px; text-align: center; color: var(--text-tertiary); font-size: 12px; font-weight: 500; }
        .data-table .col-actions { width: 180px; text-align: right; }
        .action-group { display: flex; gap: 6px; justify-content: flex-end; }

        /* ─── TOOLTIPS ─── */
        [data-tooltip] {
            position: relative;
        }
        [data-tooltip]::before {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-4px) scale(0.95);
            padding: 5px 10px;
            background: #171717;
            color: #fff;
            font-size: 11.5px;
            font-weight: 500;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
            z-index: 10;
        }
        [data-tooltip]:hover::before {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(-8px) scale(1);
        }

        /* ─── AVATAR ─── */
        .avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            object-fit: cover;
            background: var(--border-light);
            border: 2px solid var(--border);
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }
        
        tr:hover .avatar { transform: scale(1.05); }

        .avatar-lg { width: 80px; height: 80px; border-radius: 14px; border-width: 3px; }
        .avatar-placeholder { display: flex; align-items: center; justify-content: center; color: var(--text-tertiary); font-size: 16px; }
        .avatar-placeholder.avatar-lg { font-size: 28px; }
        .cell-with-avatar { display: flex; align-items: center; gap: 12px; }
        .cell-with-avatar span { font-weight: 500; }

        /* ─── BADGE ─── */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 500;
            border-radius: 20px;
            background: var(--border-light);
            color: var(--text-secondary);
            border: 1px solid var(--border);
            transition: all 0.2s ease;
        }
        tr:hover .badge { background: #fff; border-color: #d4d4d4; color: var(--text-primary); }

        /* ─── FORMS ─── */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 600; color: var(--text-primary); margin-bottom: 6px; }
        .form-hint { font-size: 12px; color: var(--text-tertiary); margin-top: 4px; }
        
        .form-input, .form-select {
            width: 100%;
            padding: 10px 14px;
            font-family: var(--font);
            font-size: 14px;
            color: var(--text-primary);
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            outline: none;
        }
        
        .form-input::placeholder { color: var(--text-tertiary); }
        .form-input:hover, .form-select:hover { border-color: #a3a3a3; }
        .form-input:focus, .form-select:focus { border-color: var(--accent); box-shadow: 0 0 0 4px rgba(23, 23, 23, 0.08); }
        .form-input.is-invalid, .form-select.is-invalid { border-color: var(--red); }
        .form-input.is-invalid:focus, .form-select.is-invalid:focus { box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1); }
        .form-error { font-size: 12.5px; color: var(--red); margin-top: 6px; display: flex; align-items: center; gap: 4px; }

        .form-file-input {
            width: 100%; padding: 10px 14px; font-family: var(--font); font-size: 13px; color: var(--text-secondary);
            background: var(--bg); border: 1px dashed var(--border); border-radius: var(--radius-sm); cursor: pointer; transition: all 0.2s;
        }
        .form-file-input:hover { border-color: #a3a3a3; background: #f4f4f5; }
        .form-actions { display: flex; gap: 10px; padding-top: 8px; }

        /* ─── TOAST NOTIFICATION ─── */
        .toast-container {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            pointer-events: none;
        }
        
        .toast {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            background: #fff;
            color: #171717;
            font-size: 13.5px;
            font-weight: 500;
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            border: 1px solid var(--border-light);
            transform: translateX(120%) scale(0.9);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: auto;
        }
        
        .toast.show {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
        
        .toast-icon {
            display: flex; align-items: center; justify-content: center;
            width: 28px; height: 28px; border-radius: 50%; font-size: 14px;
        }
        .toast-success .toast-icon { background: var(--green-light); color: var(--green); }
        .toast-error .toast-icon { background: var(--red-light); color: var(--red); }

        /* ─── CUSTOM MODAL ─── */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .modal-overlay.show { opacity: 1; visibility: visible; }
        
        .custom-modal {
            background: #fff;
            border-radius: 20px;
            padding: 32px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
            transform: scale(0.95) translateY(20px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .modal-overlay.show .custom-modal {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
        
        .modal-icon {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: var(--red-light);
            color: var(--red);
            display: flex; align-items: center; justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        .modal-title { font-size: 20px; font-weight: 700; margin-bottom: 8px; letter-spacing: -0.5px; }
        .modal-desc { font-size: 14.5px; color: var(--text-secondary); margin-bottom: 32px; line-height: 1.6; }
        .modal-actions { display: flex; gap: 12px; }
        .modal-actions .btn { flex: 1; padding: 10px; font-size: 14px; }

        /* ─── EMPTY STATE ─── */
        .empty-state { padding: 64px 24px; text-align: center; }
        .empty-state i { font-size: 48px; color: var(--border); margin-bottom: 16px; display: inline-block; transition: transform 0.3s; }
        .empty-state:hover i { transform: scale(1.1) rotate(-5deg); color: #d4d4d4; }
        .empty-state p { color: var(--text-tertiary); font-size: 14.5px; margin-bottom: 20px; }

        /* ─── BREADCRUMB / BACK ─── */
        .back-link {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 13.5px; font-weight: 500; color: var(--text-tertiary);
            text-decoration: none; margin-bottom: 20px;
            transition: color 0.2s, transform 0.2s;
        }
        .back-link:hover { color: var(--text-primary); transform: translateX(-2px); }

        /* ─── FOOTER ─── */
        .site-footer { border-top: 1px solid var(--border); padding: 24px; text-align: center; font-size: 13px; color: var(--text-tertiary); }
    </style>

    @stack('styles')
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ url('/') }}" class="brand">
                <span class="brand-icon"><i class="bi bi-mortarboard-fill"></i></span>
                SiAkademik
            </a>

            <nav class="topbar-nav" id="mainNav">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                    <i class="bi bi-columns-gap"></i> Dashboard
                </a>
                <a href="{{ url('/fakultas') }}" class="{{ request()->is('fakultas*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Fakultas
                </a>
                <a href="{{ url('/prodi') }}" class="{{ request()->is('prodi*') ? 'active' : '' }}">
                    <i class="bi bi-journal-bookmark"></i> Prodi
                </a>
            </nav>

            <button class="mobile-toggle" onclick="document.getElementById('mainNav').classList.toggle('show')">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </header>

    <main class="main-content">
        {{ $slot }}
    </main>

    <footer class="site-footer">
        &copy; {{ date('Y') }} SiAkademik &middot; Proyek Belajar Laravel — IF21
    </footer>

    {{-- Toast Container --}}
    <div class="toast-container" id="toastContainer"></div>

    {{-- Custom Confirmation Modal --}}
    <div class="modal-overlay" id="confirmModal">
        <div class="custom-modal">
            <div class="modal-icon"><i class="bi bi-exclamation-triangle"></i></div>
            <h3 class="modal-title">Konfirmasi Penghapusan</h3>
            <p class="modal-desc" id="confirmMessage">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeConfirmModal()">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmActionBtn">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        // --- 1. Toast Notification System ---
        function showToast(message, type = 'success') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            
            const iconClass = type === 'success' ? 'bi-check-lg' : 'bi-x-lg';
            
            toast.innerHTML = `
                <div class="toast-icon"><i class="bi ${iconClass}"></i></div>
                <div>${message}</div>
            `;
            
            container.appendChild(toast);
            
            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 10);
            
            // Auto remove
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 400);
            }, 6000);
        }

        // Catch Laravel session flashes
        @if(session()->has('success'))
            showToast("{{ session('success') }}", "success");
        @endif
        
        @if(session()->has('error'))
            showToast("{{ session('error') }}", "error");
        @endif

        // --- 2. Custom Delete Confirmation Interceptor ---
        let formToSubmit = null;

        function closeConfirmModal() {
            const modal = document.getElementById('confirmModal');
            modal.classList.remove('show');
            formToSubmit = null;
        }

        document.getElementById('confirmActionBtn').addEventListener('click', () => {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            // Override standard form submits that have confirm()
            const forms = document.querySelectorAll('form[onsubmit]');
            forms.forEach(form => {
                const onsubmitStr = form.getAttribute('onsubmit');
                if (onsubmitStr && onsubmitStr.includes('confirm(')) {
                    // Extract message from confirm('Message')
                    const match = onsubmitStr.match(/confirm\(['"](.*?)['"]\)/);
                    const msg = match ? match[1] : 'Apakah Anda yakin ingin menghapus data ini?';
                    
                    // Remove standard onsubmit
                    form.removeAttribute('onsubmit');
                    
                    // Add custom click handler
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        formToSubmit = form;
                        document.getElementById('confirmMessage').textContent = msg;
                        document.getElementById('confirmModal').classList.add('show');
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
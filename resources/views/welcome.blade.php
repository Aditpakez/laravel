<x-layout title="Dashboard">
    {{-- Stats --}}
    <div class="page-header">
        <div class="page-header-text">
            <h1>Dashboard</h1>
            <p>Selamat datang di Sistem Informasi Akademik</p>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 32px;">
        <div class="card">
            <div class="card-body" style="display: flex; align-items: center; gap: 16px;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #eff6ff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="bi bi-building" style="font-size: 20px; color: #2563eb;"></i>
                </div>
                <div>
                    <div style="font-size: 24px; font-weight: 700; letter-spacing: -1px;">
                        {{ \App\Models\Fakultas::count() }}
                    </div>
                    <div style="font-size: 13px; color: var(--text-secondary);">Total Fakultas</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body" style="display: flex; align-items: center; gap: 16px;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #f5f3ff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="bi bi-journal-bookmark" style="font-size: 20px; color: #7c3aed;"></i>
                </div>
                <div>
                    <div style="font-size: 24px; font-weight: 700; letter-spacing: -1px;">
                        {{ \App\Models\Prodi::count() }}
                    </div>
                    <div style="font-size: 13px; color: var(--text-secondary);">Total Program Studi</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Links --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        <a href="/fakultas" class="card" style="text-decoration: none; transition: box-shadow 150ms ease, transform 150ms ease;">
            <div class="card-body">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <h3 style="font-size: 15px; font-weight: 700; color: var(--text-primary);">Kelola Fakultas</h3>
                    <i class="bi bi-arrow-right" style="color: var(--text-tertiary);"></i>
                </div>
                <p style="font-size: 13px; color: var(--text-secondary); margin: 0;">
                    Lihat, tambah, edit, atau hapus data fakultas dan informasi dekan.
                </p>
            </div>
        </a>

        <a href="/prodi" class="card" style="text-decoration: none; transition: box-shadow 150ms ease, transform 150ms ease;">
            <div class="card-body">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <h3 style="font-size: 15px; font-weight: 700; color: var(--text-primary);">Kelola Program Studi</h3>
                    <i class="bi bi-arrow-right" style="color: var(--text-tertiary);"></i>
                </div>
                <p style="font-size: 13px; color: var(--text-secondary); margin: 0;">
                    Lihat, tambah, edit, atau hapus data program studi dan ketua prodi.
                </p>
            </div>
        </a>
    </div>
</x-layout>
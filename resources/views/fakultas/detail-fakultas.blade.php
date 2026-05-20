<x-layout title="Detail Fakultas">
    <a href="/fakultas" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div style="max-width: 560px;">
        <div class="page-header">
            <div class="page-header-text">
                <h1>{{ $fakulta->nama_fakultas }}</h1>
                <p>Detail informasi fakultas</p>
            </div>
            <a href="/fakultas/{{ $fakulta->id }}/edit" class="btn btn-secondary">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="detail-row">
                    <div class="detail-label">Nama Fakultas</div>
                    <div class="detail-value">{{ $fakulta->nama_fakultas }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nama Dekan</div>
                    <div class="detail-value">{{ $fakulta->nama_dekan }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Jumlah Prodi</div>
                    <div class="detail-value">{{ $fakulta->prodi->count() }} program studi</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Ditambahkan</div>
                    <div class="detail-value" style="color: var(--text-secondary); font-weight: 400;">
                        {{ $fakulta->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Terakhir diubah</div>
                    <div class="detail-value" style="color: var(--text-secondary); font-weight: 400;">
                        {{ $fakulta->updated_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
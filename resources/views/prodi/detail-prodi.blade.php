<x-layout title="Detail Program Studi">
    <a href="/prodi" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div style="max-width: 560px;">
        <div class="page-header">
            <div class="page-header-text">
                <h1>{{ $prodi->nama_prodi }}</h1>
                <p>Detail informasi program studi</p>
            </div>
            <a href="/prodi/{{ $prodi->id }}/edit" class="btn btn-secondary">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                {{-- Photo section --}}
                <div style="display: flex; align-items: center; gap: 16px; padding-bottom: 20px; margin-bottom: 16px; border-bottom: 1px solid var(--border-light);">
                    @if($prodi->photo_profile_kaprodi)
                        <img src="{{ asset('storage/' . $prodi->photo_profile_kaprodi) }}" 
                             alt="{{ $prodi->nama_kaprodi }}" 
                             class="avatar avatar-lg">
                    @else
                        <div class="avatar avatar-lg avatar-placeholder">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif
                    <div>
                        <div style="font-size: 16px; font-weight: 600;">{{ $prodi->nama_kaprodi }}</div>
                        <div style="font-size: 13px; color: var(--text-secondary);">Ketua Program Studi</div>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Program Studi</div>
                    <div class="detail-value">{{ $prodi->nama_prodi }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Fakultas</div>
                    <div class="detail-value">
                        <span class="badge">{{ $prodi->fakultas->nama_fakultas ?? '—' }}</span>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Ketua Prodi</div>
                    <div class="detail-value">{{ $prodi->nama_kaprodi }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Ditambahkan</div>
                    <div class="detail-value" style="color: var(--text-secondary); font-weight: 400;">
                        {{ $prodi->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Terakhir diubah</div>
                    <div class="detail-value" style="color: var(--text-secondary); font-weight: 400;">
                        {{ $prodi->updated_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

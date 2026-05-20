<x-layout title="Daftar Program Studi">
    <div class="page-header">
        <div class="page-header-text">
            <h1>Program Studi</h1>
            <p>{{ $prodi->count() }} prodi terdaftar</p>
        </div>
        <a href="/prodi/create" class="btn btn-primary">
            <i class="bi bi-plus"></i> Tambah Prodi
        </a>
    </div>

    <div class="card">
        <div class="card-body flush">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="col-num">No</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Ketua Prodi</th>
                        <th class="col-actions">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prodi as $item)
                        <tr>
                            <td class="col-num">{{ $loop->iteration }}</td>
                            <td style="font-weight: 500;">{{ $item->nama_prodi }}</td>
                            <td>
                                <span class="badge">{{ $item->fakultas->nama_fakultas ?? '—' }}</span>
                            </td>
                            <td>
                                <div class="cell-with-avatar">
                                    @if($item->photo_profile_kaprodi)
                                        <img src="{{ asset('storage/' . $item->photo_profile_kaprodi) }}" 
                                             alt="{{ $item->nama_kaprodi }}" 
                                             class="avatar">
                                    @else
                                        <div class="avatar avatar-placeholder">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    @endif
                                    <span>{{ $item->nama_kaprodi }}</span>
                                </div>
                            </td>
                            <td class="col-actions">
                                <div class="action-group">
                                    <a href="/prodi/{{ $item->id }}" class="btn btn-secondary btn-sm" data-tooltip="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/prodi/{{ $item->id }}/edit" class="btn btn-secondary btn-sm" data-tooltip="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="/prodi/{{ $item->id }}" method="POST" 
                                          onsubmit="return confirm('Hapus prodi {{ $item->nama_prodi }}?');" style="display:inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm" data-tooltip="Hapus">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-journal-bookmark"></i>
                                    <p>Belum ada data program studi</p>
                                    <a href="/prodi/create" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus"></i> Tambah Prodi
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

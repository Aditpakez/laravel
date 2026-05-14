<x-layout title="Daftar Fakultas">
    <div class="page-header">
        <div class="page-header-text">
            <h1>Fakultas</h1>
            <p>{{ $fakultas->count() }} fakultas terdaftar</p>
        </div>
        <a href="/fakultas/create" class="btn btn-primary">
            <i class="bi bi-plus"></i> Tambah Fakultas
        </a>
    </div>



    <div class="card">
        <div class="card-body flush">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="col-num">No</th>
                        <th>Nama Fakultas</th>
                        <th>Dekan</th>
                        <th class="col-actions">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fakultas as $item)
                        <tr>
                            <td class="col-num">{{ $loop->iteration }}</td>
                            <td style="font-weight: 500;">{{ $item->name }}</td>
                            <td>{{ $item->dekan }}</td>
                            <td class="col-actions">
                                <div class="action-group">
                                    <a href="/fakultas/{{ $item->id }}" class="btn btn-secondary btn-sm" data-tooltip="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/fakultas/{{ $item->id }}/edit" class="btn btn-secondary btn-sm" data-tooltip="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="/fakultas/{{ $item->id }}" method="POST" 
                                          onsubmit="return confirm('Hapus fakultas {{ $item->name }}?');" style="display:inline;">
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
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="bi bi-building"></i>
                                    <p>Belum ada data fakultas</p>
                                    <a href="/fakultas/create" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus"></i> Tambah Fakultas
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
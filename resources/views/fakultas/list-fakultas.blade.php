<x-layout title="List Fakultas">
    <div class="container mt-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">List Fakultas</h1>
            <a href="/fakultas/create" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Fakultas
            </a>
        </div>

        <!-- Alert Success -->
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <!-- Table Card -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th style="width: 35%">Nama Fakultas</th>
                                <th style="width: 30%">Nama Dekan</th>
                                <th class="text-center" style="width: 30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fakultas as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->dekan }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="/fakultas/{{ $item->id }}" class="btn btn-info text-white">
                                                Detail
                                            </a>
                                            <a href="/fakultas/{{ $item->id }}/edit" class="btn btn-warning">
                                                Edit
                                            </a>
                                            <form action="/fakultas/{{ $item->id }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus fakultas ini?');" 
                                                  style="display: inline;">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger rounded-start-0">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        <em>Belum ada data fakultas.</em>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
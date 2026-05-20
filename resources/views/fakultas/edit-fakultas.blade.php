<x-layout title="Edit Fakultas">
    <a href="/fakultas" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div style="max-width: 520px;">
        <div class="page-header">
            <div class="page-header-text">
                <h1>Edit Fakultas</h1>
                <p>Perbarui informasi fakultas</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="/fakultas/{{ $fakultas->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label">Nama Fakultas</label>
                        <input 
                            name="nama_fakultas"
                            type="text"
                            class="form-input {{ $errors->has('nama_fakultas') ? 'is-invalid' : '' }}"
                            value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"
                            autofocus>
                        @error('nama_fakultas')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Dekan</label>
                        <input 
                            name="nama_dekan"
                            type="text"
                            class="form-input {{ $errors->has('nama_dekan') ? 'is-invalid' : '' }}"
                            value="{{ old('nama_dekan', $fakultas->nama_dekan) }}">
                        @error('nama_dekan')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="/fakultas" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
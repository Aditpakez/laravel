<x-layout title="Tambah Fakultas">
    <a href="/fakultas" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div style="max-width: 520px;">
        <div class="page-header">
            <div class="page-header-text">
                <h1>Tambah Fakultas</h1>
                <p>Isi informasi fakultas baru</p>
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
                <form action="/fakultas" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama Fakultas</label>
                        <input 
                            name="name_fakultas"
                            type="text"
                            class="form-input {{ $errors->has('name_fakultas') ? 'is-invalid' : '' }}"
                            value="{{ old('name_fakultas') }}"
                            placeholder="cth. Fakultas Teknik"
                            autofocus>
                        @error('name_fakultas')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Dekan</label>
                        <input 
                            name="dekan"
                            type="text"
                            class="form-input {{ $errors->has('dekan') ? 'is-invalid' : '' }}"
                            value="{{ old('dekan') }}"
                            placeholder="cth. Prof. Dr. Budi Santoso">
                        @error('dekan')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/fakultas" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
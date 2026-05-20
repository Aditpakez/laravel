<x-layout title="Edit Program Studi">
    <a href="/prodi" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div style="max-width: 520px;">
        <div class="page-header">
            <div class="page-header-text">
                <h1>Edit Program Studi</h1>
                <p>Perbarui informasi prodi</p>
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
                <form action="/prodi/{{ $prodi->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label">Fakultas</label>
                        <select name="fakultas_id" class="form-select {{ $errors->has('fakultas_id') ? 'is-invalid' : '' }}">
                            <option value="">Pilih fakultas</option>
                            @foreach ($fakultas as $item)
                                <option value="{{ $item->id }}" {{ old('fakultas_id', $prodi->fakultas_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_fakultas }}
                                </option>
                            @endforeach
                        </select>
                        @error('fakultas_id')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Program Studi</label>
                        <input 
                            name="nama_prodi"
                            type="text"
                            class="form-input {{ $errors->has('nama_prodi') ? 'is-invalid' : '' }}"
                            value="{{ old('nama_prodi', $prodi->nama_prodi) }}">
                        @error('nama_prodi')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Ketua Prodi</label>
                        <input 
                            name="nama_kaprodi"
                            type="text"
                            class="form-input {{ $errors->has('nama_kaprodi') ? 'is-invalid' : '' }}"
                            value="{{ old('nama_kaprodi', $prodi->nama_kaprodi) }}">
                        @error('nama_kaprodi')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Foto Ketua Prodi</label>
                        @if($prodi->photo_profile_kaprodi)
                            <div class="photo-preview" style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $prodi->photo_profile_kaprodi) }}" alt="{{ $prodi->nama_kaprodi }}">
                                <span>Foto saat ini</span>
                            </div>
                        @endif
                        <input 
                            name="photo_profile_kaprodi"
                            type="file"
                            accept="image/*"
                            class="form-file-input"
                            id="photoInput"
                            onchange="previewPhoto(this)">
                        <div class="form-hint">Kosongkan jika tidak ingin mengubah foto. Upload baru akan menghapus foto lama.</div>
                        @error('photo_profile_kaprodi')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                        <div id="photoPreview" style="display:none; margin-top: 10px;">
                            <div class="photo-preview">
                                <img id="previewImg" src="" alt="Preview">
                                <span id="previewName"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="/prodi" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewPhoto(input) {
            const preview = document.getElementById('photoPreview');
            const img = document.getElementById('previewImg');
            const name = document.getElementById('previewName');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    img.src = e.target.result;
                    name.textContent = input.files[0].name;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush
</x-layout>

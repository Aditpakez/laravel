<x-layout>
    <h1> Tambah prodi</h1>

    <form action="/prodi" method="post" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            <select name="fakultas_id" class="form-select">
                <option value="">pilih fakultas</option>
                @foreach ($fakultas as $item)
                <option value="{{$item->id}}">{{$item->name }}</option>                    
                @endforeach
            </select>
        </div>
        </div>
    <div class="formgrup">
        <input name="nama_prodi" type="text" class="form-comtroll">
    </div>
    <div class="formgrup">
        <input name="nama_kaprodi" type="text" class="form-comtroll">
    </div>
    <div class="formgrup">
        <input name="photo_prodi" type="file" accept="image/*" class="form-comtroll">
    </div>
    <div>
        <button type="submit" class="btn btn-primary" >simpan</button>
    </div>
</form>
</x-layout>
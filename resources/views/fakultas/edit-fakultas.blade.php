
<x-layout title="edit-fakultas">
    <h1>List Fakultas</h1>
    <a href="/add-fakultas">Add New Fakultas</a>

    <x-layout>
    <div>
        <h1>Belajar Laravel View</h1>

        <form action="/fakultas/{{ $fakultas->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input 
                    name="name_fakultas"
                    type="text"
                    value="{{ $fakultas->name }}"
                    class="form-control"
                    placeholder="Nama Fakultas">
            </div>
            <div class="form-group">
                <input 
                    name="dekan"
                    type="text"
                    value="{{ $fakultas->dekan }}"
                    class="form-control" 
                    placeholder="Dekan">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>
    
    <a href="/add-fakultas">Edit Fakultas</a>

</x-layout>
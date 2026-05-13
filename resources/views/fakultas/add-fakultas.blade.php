<x-layout title="add-fakultas">
    <div>
        <h1>Belajar Laravel View</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>    
            </div>
        @endif

        <form action="/fakultas" method="post">
            @csrf
            <div class="form-group">
                <input 
                    name="name_fakultas"
                    type="text"
                    class="form-control"
                    value="{{ old('name_fakultas') }}"
                    placeholder="Nama Fakultas">
            </div>
            <div class="form-group">
                <input 
                    name="dekan"
                    type="text"
                    class="form-control" 
                    value="{{ old('dekan') }}"
                    placeholder="Dekan">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>
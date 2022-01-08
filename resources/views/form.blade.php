<x-main title="Tambah">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Form Tambah
                    </div>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Judul" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" id="Judul" value="{{ old('judul') }}" placeholder="">
                                @error('judul')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug Buku</label>
                                <input type="text" class="form-control" id="slug" value="{{ old('slug') }}" placeholder="">
                                @error('slug')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id">Kategori</label>
                                <select class="custom-select rounded-0 form-control" id="category_id" name="category_id" >
                                    <option disabled selected>Pilih Category</option>
                                    @foreach($category as $i)
                                        @if(old('category_id') == $i->id)
                                        <option value="{{ $i->id }}" selected>{{ $i->name }}</option>
                                        @else
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">penulis Buku</label>
                                <input type="text" class="form-control" id="penulis" value="{{ old('penulis') }}" placeholder="">
                                @error('penulis')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">penerbit Buku</label>
                                <input type="text" class="form-control" id="penerbit" value="{{ old('penerbit') }}" placeholder="">
                                @error('penerbit')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sampul" class="form-label">Gambar Buku</label>
                                <input class="form-control" type="file" id="sampul" name="sampul">
                                @error('sampul')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
<x-main title="Tambah">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Form Tambah
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Judul" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" id="judul" name="judul"value="{{ old('judul') }}" placeholder="">
                                @error('judul')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug Buku</label>
                                <input type="text" readonly class="form-control" name="slug" id="slug" value="{{ old('slug') }}" placeholder="">
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
                                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis') }}" placeholder="">
                                @error('penulis')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">penerbit Buku</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" placeholder="">
                                @error('penerbit')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sampul" class="form-label">Gambar Buku</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                <input class="form-control" type="file" id="sampul" name="sampul" onchange="previewImage()">
                                @error('sampul')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @slot('js')
        <script>
            $('#judul').on('change',function(e){
                $.get("{{ route('book.check') }}",
                {'judul': $(this).val()},
                function(data){
                    $('#slug').val(data.slug);
                });
            });

            function previewImage(){
                const image = document.querySelector("#sampul");
                const imgview = document.querySelector(".img-preview");
                imgview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFReader){
                    imgview.src = oFReader.target.result;
                }
            }
    </script>
    @endslot
</x-main>
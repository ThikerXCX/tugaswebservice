<x-main title="home">
    <div class="container mb-4 mt-5">
    <section class="best-seel-area pt--80 pb--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center">
                        <h2>Daftar Buku</h2>
                        <p>kumpulan Buku</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($buku as $k)
            <div class="col">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title text-center"><h5>{{ $k->judul }}</h5></div>
                    </div>
                    <img src="/storage/{{ $k->sampul }}" class="card-img-center img-responsive" alt="...">
                    <div class="card-body">
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary show"  value="{{ $k->slug }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col">
                            <img src="" class="img-fluid img-thumbnail" id="modalimg" alt="...">
                        </div>
                            <div class="card-body text-center">
                                <h5 class="card-title" id="title"></h5>
                                <p class="card-text" id="kategori"></p>
                                <p class="card-text" id="penulis"></p>
                                <p class="card-text" id="penerbit"></p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@slot('js')
    <script>
        $(document).ready(function(){
            $('.show').on('click',function(){
                var x = $(this).val();
                $.ajax({
                    method : 'get',
                    url : "/home/" + x,
                }).done(function(data){
                    document.getElementById('modalimg').src=`/storage/`+data.buku.sampul;
                    document.getElementById('title').innerHTML=data.buku.judul;
                    document.getElementById('kategori').innerHTML='Kategori : ' + data.cat;
                    document.getElementById('penulis').innerHTML='Penulis : ' + data.buku.penulis;
                    document.getElementById('penerbit').innerHTML='Penerbit : ' + data.buku.penerbit;
                    $('#exampleModal').modal("show");
                });
            });
        });
    </script>
@endslot
</x-main>
<x-main title="buku">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="text-center">
                    <h1 class="">Buku</h1>
                </div>
            </div>
        </div>
    </div> 
    <div class="container">
        <a href="{{ route('book.create') }}" class="btn btn-primary mb-2">Tambah Berita</a>
        <div class="row">
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>judul</th>
                                <th>kategori</th>
                                <th>penulis</th>
                                <th>penerbit</th>
                                <th>sampul</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->judul }}</td>
                                <td>{{ $i->category->name }}</td>
                                <td>{{ $i->penulis }}</td>
                                <td>{{ $i->penerbit }}</td> 
                                <td><button class="btn btn-success sampul" value="{{ $i->slug }}" ><i class="far fa-eye"></i></button></td>
                                <td><a class="btn btn-warning" href="#"><i class="far fa-edit"></i></a>
                                    <form action="#" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash nav-icon"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sampul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="imgmodal" class="img-fluid" alt="...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    @slot('js')
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
            $(document).ready(function(){
                $('.sampul').on('click',function(){
                    var x = $(this).val();
                    $.ajax({
                        method : 'get',
                        url : "/buku/" + x,
                    }).done(function(data){
                        document.getElementById('imgmodal').src=`/img/`+data.buku.sampul;
                        $('#viewmodal').modal("show");
                    });
                });
            });
        </script>
    @endslot
</x-main>
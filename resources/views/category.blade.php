<x-main title="category">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success mb-2" role="alert">
                {{ session()->get('success')  }}
            </div>
        @endif
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>
        <div class="row">    
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>
                                        <button class="btn btn-warning edit" data-bs-toggle="modal" data-bs-target="#editmodal" id="edit" value="{{ $i->id }}"><i class="far fa-edit"></i></button>
                                        <form action="{{ route('cat.delete',[$i->id]) }}" method="post" class="d-inline">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cat.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cat.edit') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="editid" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="editinput" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="editinput" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @slot('js')
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });

            $('.edit').on('click',function(){
                var x = $(this).val();
                $.ajax({
                    method : 'get',
                    url : "/categori/" + x,
                }).done(function(data){
                    $("#editid").val(data.cat.id);
                    $("#editinput").val(data.cat.name);
                });
            });


        </script>
    @endslot
</x-main>
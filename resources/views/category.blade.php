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
        <a href="#" class="btn btn-primary mb-2">Tambah Berita</a>
        <div class="row">
            
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Lori Lynch</td>
                                <td><a class="btn btn-warning" href="#"><i class="far fa-edit"></i></a>
                                    <form action="#" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash nav-icon"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-main>
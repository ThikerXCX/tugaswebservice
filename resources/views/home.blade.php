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
                    <img src="/storage/{{ $k->sampul }}" class="card-img-center img-responsive" alt="...">
                    <div class="card-body">
                    </div>
                    <div class="card-footer"><h5>{{  $k->judul  }}</h5></div>
                </div>
            </div>
            @endforeach
        </div>
        
    </section>
</div>
</x-main>
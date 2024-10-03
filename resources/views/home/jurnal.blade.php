  @extends('layout.app')
 @section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/bg_2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Jurnal Nusantara</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Jurnal Nusantara <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach($jurnals as $document)
            <div class="col-md-3 col-sm-6 mb-4">
                <!-- Menampilkan gambar yang telah diupload -->
                <img src="{{ Storage::url($document->image) }}" class="img-fluid rounded" alt="Gambar Dokumen">
            </div>
            <div class="col-md-8">
                <!-- Menampilkan judul dan deskripsi dokumen -->
                <h2>{{ $document->title }}</h2>
                <p>{{ Str::limit( $document->description,400) }}</p>
                <!-- Tombol untuk membaca PDF -->
                <a href="{{ asset('storage/' . $document->file) }}" class="btn btn-primary mb-3" target="_blank">Baca Selengkapnya</a>
            </div>
            @endforeach
        </div>
    </div>
     <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <!-- Tampilkan tombol 'Previous' -->
                        @if ($jurnals->onFirstPage())
                            <li class="disabled"><span>&lt;</span></li>
                        @else
                            <li><a href="{{ $jurnals->previousPageUrl() }}">&lt;</a></li>
                        @endif

                        <!-- Tampilkan halaman-halaman -->
                        @foreach(range(1, $jurnals->lastPage()) as $page)
                            @if ($page == $jurnals->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $jurnals->url($page) }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        <!-- Tampilkan tombol 'Next' -->
                        @if ($jurnals->hasMorePages())
                            <li><a href="{{ $jurnals->nextPageUrl() }}">&gt;</a></li>
                        @else
                            <li class="disabled"><span>&gt;</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
</section>
		
		
   @endsection
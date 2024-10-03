  @extends('layout.app')
 @section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/bg_2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Category</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="block-20 d-flex align-items-end" style="background-image: url('{{ Storage::url($blog->image) }}');">
                            <div class="meta-date text-center p-2">
                                <span class="mos">{{ date('d F Y', strtotime($blog->publish_date)) }}</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="{{ route('blogs.show', ['id' => $blog->id]) }}">{{ $blog->nilai->judul }}</a></h3>
                            <p>{{ Str::limit($blog->deskripsi, 94) }}</p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="mr-2">{{ $blog->nilai->siswa->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

   @endsection
  @extends('layout.app')
 @section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/bg_2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Our Proyek</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Proyek <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
                     @foreach ($posts as $blog)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="block-20 d-flex align-items-end" style="background-image: url('{{ Storage::url($blog->image) }}');">
								<div class="meta-date text-center p-2">
                  <span class="mos">{{ date('d F Y', strtotime($blog->publish_date)) }}</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">{{ $blog->nilai->judul }}</a></h3>
               <p>{!! strip_tags(Str::limit($blog->nilai->deskripsi, 94)) !!}</p>
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
        <div class="row no-gutters my-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="{{ $posts->previousPageUrl() }}"><i class="ion-ios-arrow-back"></i></a></li>
                        @for ($i = 1; $i <= $posts->lastPage(); $i++)
                            <li class="{{ $i == $posts->currentPage() ? 'active' : '' }}">
                                <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li><a href="{{ $posts->nextPageUrl() }}"><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
		</section>
   @endsection
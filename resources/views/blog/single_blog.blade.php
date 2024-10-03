  @extends('layout.app')
 @section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/bg_2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Proyek Single</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Proyek <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3">{{ $posts->nilai->judul }}</h2>
            <p>{!! strip_tags($posts->nilai->deskripsi) !!}</p>
             <!-- Menambahkan iframe YouTube di bawah deskripsi -->
    <div class="embed-responsive embed-responsive-16by9">
         <iframe class="w-100" height="315" src="https://www.youtube.com/embed/{{ $posts->nilai->text }}" 
		frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
		allowfullscreen>
</iframe>
    </div>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
             
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                        @foreach($categories as $category)
                            @if($category->tema) <!-- Memastikan tema ada -->
                                <li>
                                    <a href="{{ route('blogs.category', ['tema' => $category->tema]) }}">
                                        {{ $category->tema }}<span></span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Post Terbaru</h3>
              @foreach ($blogs as $blog)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ Storage::url($blog->image) }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{ route('blogs.show', ['id' => $blog->id]) }}">{{ $blog->nilai->judul }}</</a></h3>
                  <div class="meta">
                    <div><a href="{{ route('blogs.show', ['id' => $blog->id]) }}"><span class="icon-calendar"></span> {{ date('d F Y', strtotime($blog->publish_date)) }}</a></div>
                    <div><a href="{{ route('blogs.show', ['id' => $blog->id]) }}"><span class="icon-person"></span>{{ $blog->nilai->siswa->name }}</a></div>
                  </div>
                </div>
              </div>
            @endforeach
            </div> 
          </div><!-- END COL -->
        </div>
			</div>
		</section>
         @endsection